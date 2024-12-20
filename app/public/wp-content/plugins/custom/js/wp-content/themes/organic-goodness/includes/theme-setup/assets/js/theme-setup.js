
/* jshint strict: false */
/* global pagenow:true, ts_theme_setup_params */
var TH_Theme_setup = (function (wp, $) {

    var t;

    var drawer_opened = 'ts_theme_setup__drawer--open';

    // callbacks from form button clicks.
    var callbacks = {
        install_child: function (btn) {
            var installer = new ChildTheme();
            installer.init(btn);
        },
        install_plugins: function (btn) {
            var plugins = new PluginManager();
            plugins.init(btn);
        },
        install_content: function (btn) {
            var content = new ContentManager();
            content.init(btn);
        }
    };

    function window_loaded() {

        var body = $('.ts_theme_setup__body');
        var drawer_trigger = $('#ts_theme_setup__drawer-trigger');

        setTimeout(function () {
            body.addClass('loaded');
        }, 100);

        drawer_trigger.on('click', function () {
            body.toggleClass(drawer_opened);
        });

        $('.ts_theme_setup__button--proceed:not(.ts_theme_setup__button--closer)').click(function (e) {
            e.preventDefault();
            var goTo = this.getAttribute("href");

            body.addClass('exiting');

            setTimeout(function () {
                window.location = goTo;
            }, 400);
        });

        $(".ts_theme_setup__button--closer").on('click', function (e) {

            body.removeClass(drawer_opened);

            e.preventDefault();
            var goTo = this.getAttribute("href");

            setTimeout(function () {
                body.addClass('exiting');
            }, 600);

            setTimeout(function () {
                window.location = goTo;
            }, 1100);
        });

        $(".button-next").on("click", function (e) {
            e.preventDefault();
            var loading_button = ts_theme_setup_loading_button(this);
            if (!loading_button) {
                return false;
            }
            var data_callback = $(this).data("callback");
            if (data_callback && typeof callbacks[data_callback] !== "undefined") {
                // We have to process a callback before continue with form submission.
                callbacks[data_callback](this);
                return false;
            } else {
                return true;
            }
        });
    }

    function ChildTheme() {
        var body = $('.ts_theme_setup__body');
        var complete, notice = $("#child-theme-text");

        function ajax_callback(r) {

            if (typeof r.done !== "undefined") {
                setTimeout(function () {
                    notice.addClass("lead");
                }, 0);
                setTimeout(function () {
                    notice.addClass("success");
                    notice.html(r.message);
                }, 600);


                complete();
            } else {
                setTimeout(function () {
                    notice.addClass("lead");
                }, 0);
                setTimeout(function () {
                    notice.addClass("error");
                    notice.html(r.error);
                }, 600);

                setTimeout(function () {
                    $(".ts_theme_setup__button").removeClass('ts_theme_setup__button--loading');
                    $(".ts_theme_setup__button.ts_theme_setup__button--next").data("done-loading","no").html(ts_theme_setup_params.texts.try_again);
                    notice.removeClass("lead success error");
                }, 1500);
            }
        }

        function do_ajax() {
            jQuery.post(ts_theme_setup_params.ajaxurl, {
                action: "ts_theme_setup_child_theme",
                wpnonce: ts_theme_setup_params.wpnonce,
            }, ajax_callback).fail(ajax_callback);
        }

        return {
            init: function (btn) {
                $(".ts_theme_setup__button.ts_theme_setup__button--next").html(ts_theme_setup_params.texts.installing);
                complete = function () {

                    setTimeout(function () {
                        $(".ts_theme_setup__body").addClass('js--finished');
                        $(".ts_theme_setup__button").removeClass('ts_theme_setup__button--loading');
                        $(".ts_theme_setup__button.ts_theme_setup__button--next").html(ts_theme_setup_params.texts.next);
                    }, 1500);

                    body.removeClass(drawer_opened);

                    setTimeout(function () {
                        $('.ts_theme_setup__body').addClass('exiting');
                    }, 3500);

                    setTimeout(function () {
                        window.location.href = btn.href;
                    }, 4000);

                };
                do_ajax();
            }
        };
    }

    function PluginManager() {

        return {
            init: function (btn) {
                if ( ! wp ) {
                    return;
                }

                pagenow = ts_theme_setup_params.pagenow;

                var $button = $(btn);
                var notice = $('p#plugin-text');

                if ($button.hasClass('activate-now')) {
                    $(".ts_theme_setup__button.ts_theme_setup__button--next").html(ts_theme_setup_params.texts.activating);
                    jQuery.post(ts_theme_setup_params.ajaxurl, {
                        action: "ts_theme_setup_activate_plugin",
                        wpnonce: ts_theme_setup_params.wpnonce,
                        plugin: $button.data('slug'),
                    }, function (r) {

                        if (typeof r.done !== "undefined") {
                            setTimeout(function () {
                                notice.addClass("lead");
                            }, 0);
                            setTimeout(function () {
                                notice.addClass("success");
                                notice.html(r.message);
                            }, 600);
    
                            setTimeout(function () {
                                $(".ts_theme_setup__body").addClass('js--finished');
                                $(".ts_theme_setup__button").removeClass('ts_theme_setup__button--loading');
                                $(".ts_theme_setup__button.ts_theme_setup__button--next").html(ts_theme_setup_params.texts.next);
                            }, 1300);
    
                            $('.ts_theme_setup__body').removeClass(drawer_opened);
        
                            setTimeout(function () {
                                $('.ts_theme_setup__body').addClass('exiting');
                            }, 3500);
        
                            setTimeout(function () {
                                window.location.href = ts_theme_setup_params.next_link;
                            }, 4000);
                        } else {
                            setTimeout(function () {
                                notice.addClass("lead");
                            }, 0);
                            setTimeout(function () {
                                notice.addClass("error");
                                notice.html(r.error);
                            }, 600);
            
                            setTimeout(function () {
                                $(".ts_theme_setup__button").removeClass('ts_theme_setup__button--loading');
                                $(".ts_theme_setup__button.ts_theme_setup__button--next").data("done-loading","no").html(ts_theme_setup_params.texts.try_again);
                                notice.removeClass("lead success error");
                            }, 1500);
                        }
                    });

                    return true;
                }

                if (
                    $button.hasClass('updating-message') ||
                    $button.hasClass('button-disabled')
                ) {
                    return;
                }

                if (
                    wp.updates.shouldRequestFilesystemCredentials &&
                    !wp.updates.ajaxLocked
                ) {
                    wp.updates.requestFilesystemCredentials(btn);

                    $(document).on(
                        'credential-modal-cancel',
                        function () {
                            var $message = $('.organic-goodness-install-now.updating-message');

                            $message
                                .removeClass('updating-message')
                                .text(wp.updates.l10n.installNow);

                            wp.a11y.speak(wp.updates.l10n.updateCancel, 'polite');
                        }
                    );
                }
                
                wp.updates.installPlugin(
                    {
                        slug: $button.data('slug'),
                        pagenow: pagenow,
                        success: function() {
                            $(".ts_theme_setup__button.ts_theme_setup__button--next").html(ts_theme_setup_params.texts.activating);
                            jQuery.post(ts_theme_setup_params.ajaxurl, {
                                action: "ts_theme_setup_activate_plugin",
                                wpnonce: ts_theme_setup_params.wpnonce,
                                plugin: $button.data('slug'),
                            }, function () {
                                setTimeout(function () {
                                    notice.addClass("lead");
                                }, 0);
                                setTimeout(function () {
                                    notice.addClass("success");
                                    notice.html(ts_theme_setup_params.texts.plugin_success);
                                }, 600);
        
                                setTimeout(function () {
                                    $(".ts_theme_setup__body").addClass('js--finished');
                                    $(".ts_theme_setup__button.ts_theme_setup__button--next").removeClass('ts_theme_setup__button--loading');
                                    $(".ts_theme_setup__button.ts_theme_setup__button--next").html(ts_theme_setup_params.texts.next);
                                }, 1300);
        
                                $('.ts_theme_setup__body').removeClass(drawer_opened);
            
                                setTimeout(function () {
                                    $('.ts_theme_setup__body').addClass('exiting');
                                }, 3500);
            
                                setTimeout(function () {
                                    window.location.href = ts_theme_setup_params.next_link;
                                }, 4000);
                            });
                        },
                        error: function() {
                            setTimeout(function () {
                                notice.addClass("lead");
                            }, 0);
                            setTimeout(function () {
                                notice.addClass("error");
                                notice.html(ts_theme_setup_params.texts.plugin_install_error);
                                $(".ts_theme_setup__button.ts_theme_setup__button--next").data("done-loading","no").html(ts_theme_setup_params.texts.try_again);
                            }, 600);
    
                            setTimeout(function () {
                                $(".ts_theme_setup__button").removeClass('ts_theme_setup__button--loading updating-message button-disabled');
                                notice.removeClass("lead success error");
                            }, 1300);
                        }
                    }
                );
            }
        };
    }
    function ContentManager() {

        var body = $('.ts_theme_setup__body');
        var complete;
        var items_completed = 0;
        var current_item = "";
        var $current_node;
        var current_item_hash = "";

        function ajax_callback(response) {
            var currentSpan = $current_node.find("label");
            if (typeof response === "object" && typeof response.message !== "undefined") {
                currentSpan.addClass(response.message.toLowerCase());

                if (typeof response.url !== "undefined") {
                    // we have an ajax url action to perform.
                    if (response.hash === current_item_hash) {
                        currentSpan.addClass("status--failed");
                        find_next();
                    } else {
                        current_item_hash = response.hash;

                        // Fix the undefined selected_index issue on new AJAX calls.
                        if (typeof response.selected_index === "undefined") {
                            response.selected_index = $('.js-ts_theme_setup-demo-import-select').val() || 0;
                        }

                        jQuery.post(response.url, response, ajax_callback).fail(ajax_callback); // recuurrssionnnnn
                    }
                } else if (typeof response.done !== "undefined") {
                    // finished processing this plugin, move onto next
                    find_next();
                } else {
                    // error processing this plugin
                    find_next();
                }
            } else {
                console.log(response);
                // error - try again with next plugin
                currentSpan.addClass("status--error");
                find_next();
            }
        }

        function process_current() {
            if (current_item) {
                var $check = $current_node.find("input:checkbox");
                if ($check.is(":checked")) {
                    jQuery.post(ts_theme_setup_params.ajaxurl, {
                        action: "ts_theme_setup_content",
                        wpnonce: ts_theme_setup_params.wpnonce,
                        content: current_item,
                        selected_index: $('.js-ts_theme_setup-demo-import-select').val() || 0
                    }, ajax_callback).fail(ajax_callback);
                } else {
                    $current_node.addClass("skipping");
                    setTimeout(find_next, 300);
                }
            }
        }

        function find_next() {
            var do_next = false;
            if ($current_node) {
                if (!$current_node.data("done_item")) {
                    items_completed++;
                    $current_node.data("done_item", 1);
                }
                $current_node.find(".spinner").css("visibility", "hidden");
            }
            var $items = $(".ts_theme_setup__drawer--import-content__list-item");
            $items.each(function () {
                if (current_item === "" || do_next) {
                    current_item = $(this).data("content");
                    $current_node = $(this);
                    process_current();
                    do_next = false;
                } else if ($(this).data("content") === current_item) {
                    do_next = true;
                }
            });
            if (items_completed >= $items.length) {
                complete();
            }
        }

        return {
            init: function (btn) {
                $(".ts_theme_setup__button.ts_theme_setup__button--next").html(ts_theme_setup_params.texts.importing);
                $(".ts_theme_setup__drawer--import-content").addClass("installing");
                $(".ts_theme_setup__drawer--import-content").find("input").prop("disabled", true);
                complete = function () {

                    setTimeout(function () {
                        body.removeClass(drawer_opened);
                    }, 500);

                    setTimeout(function () {
                        $(".ts_theme_setup__body").addClass('js--finished');
                        $(".ts_theme_setup__button").removeClass('ts_theme_setup__button--loading');
                        $(".ts_theme_setup__button.ts_theme_setup__button--next").html(ts_theme_setup_params.texts.next);
                    }, 1500);

                    setTimeout(function () {
                        $('.ts_theme_setup__body').addClass('exiting');
                    }, 3400);

                    setTimeout(function () {
                        window.location.href = btn.href;
                    }, 4000);
                };
                find_next();
            }
        };
    }

    function ts_theme_setup_loading_button(btn) {

        var $button = jQuery(btn);

        if ($button.data("done-loading") === "yes") {
            return false;
        }

        var completed = false;

        $button.data("done-loading", "yes");

        $button.addClass("ts_theme_setup__button--loading");

        return {
            done: function () {
                completed = true;
                $button.attr("disabled", false);
            }
        };
    }

    return {
        init: function () {
            t = this;
            $(window_loaded);
        },
        callback: function (func) {
            console.log(func);
            console.log(this);
        }
    };

})(window.wp, jQuery);

TH_Theme_setup.init();