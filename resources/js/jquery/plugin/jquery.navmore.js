(function($) {

    $.navmore = {
        defaults: {
        }
    };

    // Constructor
    var NavMore = function($e, _options) {

        var data        = $e.data('navmore'),
            options     = $.extend({}, $.navmore.defaults, _options, data || {});

        // Инициализация

        var render = function () {

            var $tabs = $e.find('ul.navbar-nav');
            var $more = $tabs.find('li.dropdown > ul');

            $(window).on('resize.navbar', function() {
                updateWidth();
            });


            var hideOneTab = function () {
                var count = $tabs.children().size();
                var $one = $tabs.children().eq(count - 2);
                $one.prependTo($more);
            };
            var unhideOneTab = function () {
                var count = $tabs.children().size();
                var $one = $more.children().eq(0);
                if ($one.size()) {
                    $one.insertBefore($tabs.children().eq(count - 2));
                }
            };

            var moreWidth = $('#nav-more-dropdown').width();

            var updateWidth = function () {
                //var windowWidth = $(window.document).width();
                var windowWidth = window.innerWidth;

                $more.children('li').each(function (i, li) {
                    unhideOneTab();
                });

                $more.parent().addClass('hide');

                if (windowWidth < 768) {
                    return;
                }

                var headerWidth = $e.width();

                var maxWidth = headerWidth - 50-/*546 -*/ moreWidth;

                var width = $tabs.width();
                while (width > maxWidth) {
                    hideOneTab();
                    width = $tabs.width();
                }

                if ($more.children().size() > 0) {
                    $more.parent().removeClass('hide');
                }
            };

            /*var processUpdateWidth = function () {
                if ($navbar.height() > navbarNeededHeight) {
                    updateWidth();
                    setTimeout(function () {
                        processUpdateWidth();
                    }, 200);
                } else {
                    setTimeout(function () {
                        processUpdateWidth();
                    }, 1000);
                }
            };

            processUpdateWidth();*/
            updateWidth();

        };

        render();

        $.extend($e.navmore, {
            //destroy: destroy
        });

        return $e;
    };

    $.fn.navmore = function(m) {
        return this.each(function() {

            var $this = $(this), data = $this.data('navmore');

            if (data && data.initialized) return;

            var navmore = new NavMore($this, m);
        });
    };
})(jQuery);

/*
Espo.define('Views.Site.Navbar', 'View', function (Dep) {

    return Dep.extend({

        template: 'site.navbar',

        currentTab: null,

        data: function () {
            return {
                tabs: this.tabDefs,
                title: this.options.title,
                menu: this.getMenuDefs(),
                quickCreateList: this.quickCreateList,
                enableQuickCreate: this.quickCreateList.length > 0,
                userName: this.getUser().get('name'),
                userId: this.getUser().id,
                logoSrc: this.getLogoSrc()
            };
        },

        events: {
            'click .navbar-collapse.in a': function (e) {
                var $a = $(e.currentTarget);
                var href = $a.attr('href');
                if (href && href != '#') {
                    this.$el.find('.navbar-collapse.in').collapse('hide');
                }
            },
            'click a[data-action="quick-create"]': function (e) {
                e.preventDefault();
                var scope = $(e.currentTarget).data('name');
                this.notify('Loading...');
                this.createView('quickCreate', 'Modals.Edit', {scope: scope}, function (view) {
                    view.once('after:render', function () {
                        this.notify(false);
                    });
                    view.render();
                });
            },
        },

        getLogoSrc: function () {
            var companyLogoId = this.getConfig().get('companyLogoId');
            if (!companyLogoId) {
                return 'client/img/logo.png';
            }
            return '?entryPoint=LogoImage&size=small-logo';
        },

        setup: function () {
            this.getRouter().on('routed', function (e) {
                if (e.controller) {
                    this.selectTab(e.controller);
                } else {
                    this.selectTab(false);
                }
            }.bind(this));

            this.tabList = this.getConfig().get('tabList').filter(function (scope) {
                if (this.getMetadata().get('scopes.' + scope + '.acl')) {
                    return this.getAcl().check(scope);
                }
                return true;
            }, this);

            this.quickCreateList = (this.getConfig().get('quickCreateList') || []).filter(function (scope
                ) {
                if (this.getMetadata().get('scopes.' + scope + '.acl')) {
                    return this.getAcl().check(scope, 'edit');
                }
                return true;
            }, this);

            this.createView('notificationsBadge', 'Notifications.Badge', {
                el: this.options.el + ' .notifications-badge-container'
            });

            this.createView('globalSearch', 'GlobalSearch.GlobalSearch', {
                el: this.options.el + ' .global-search-container'
            });

            this.tabDefs = this.getTabDefs();

            this.once('remove', function () {
                $(window).off('resize.navbar');
            });
        },


        afterRender: function () {
            this.selectTab(this.getRouter().getLast().controller);

            var self = this;
            var $tabs = this.$el.find('ul.tabs');
            var $more = $tabs.find('li.dropdown > ul');

            $(window).on('resize.navbar', function() {
                updateWidth();
            });


            var hideOneTab = function () {
                var count = $tabs.children().size();
                var $one = $tabs.children().eq(count - 2);
                $one.prependTo($more);
            };
            var unhideOneTab = function () {
                var count = $tabs.children().size();
                var $one = $more.children().eq(0);
                if ($one.size()) {
                    $one.insertAfter($tabs.children().eq(count - 2));
                }
            };

            var tabCount = this.tabList.length;

            var $navbar = $('#navbar .navbar');

            var navbarNeededHeight = 45;

            var moreWidth = $('#nav-more-tabs-dropdown').width();


            var updateWidth = function () {
                var windowWidth = $(window.document).width();

                var windowWidth = window.innerWidth;

                $more.children('li').each(function (i, li) {
                    unhideOneTab();
                });

                $more.parent().addClass('hide');

                if (windowWidth < 768) {
                    return;
                }

                var headerWidth = this.$el.width();

                var maxWidth = headerWidth - 546 - moreWidth;

                var width = $tabs.width();
                while (width > maxWidth) {
                    hideOneTab();
                    width = $tabs.width();
                }

                if ($more.children().size() > 0) {
                    $more.parent().removeClass('hide');
                }
            }.bind(this);

            var processUpdateWidth = function () {
                if ($navbar.height() > navbarNeededHeight) {
                    updateWidth();
                    setTimeout(function () {
                        processUpdateWidth();
                    }, 200);
                } else {
                    setTimeout(function () {
                        processUpdateWidth();
                    }, 1000);
                }
            };

            processUpdateWidth();

        },

        selectTab: function (name) {
            if (this.currentTab != name) {
                this.$el.find('ul.tabs li.active').removeClass('active');
                if (name) {
                    this.$el.find('ul.tabs  li[data-name="' + name + '"]').addClass('active');
                }
                this.currentTab = name;
            }
        },

        getTabList: function () {
            return this.tabList;
        },

        getTabDefs: function () {
            var tabDefs = [];
            this.getTabList().forEach(function (tab, i) {
                var o = {
                    link: '#' + tab,
                    label: this.getLanguage().translate(tab, 'scopeNamesPlural'),
                    name: tab
                };
                tabDefs.push(o);
            }, this);
            return tabDefs;
        },
*/