    //$(function() {
        var $btn_start = $("#start-tour");

        var tour = new Tour({
            /*
            onStart: function() {
                return true;
                //return $btn_start.parent().addClass("disabled", true);
            },

            onResume: function() {
                return true;
                //return $btn_start.parent().addClass("disabled", true);
            },

            onEnd: function() {
                return true;
                //return $btn_start.parent().removeClass("disabled", true);
            },*/

            template:   "<div class='popover tour'>"+
                        "<div class='arrow'></div>"+
                        "<h3 class='popover-title'></h3>"+
                        "<div class='popover-content'></div>"+
                        "<div class='popover-navigation'>"+
                        "<div class='btn-group'>"+
                        "<button class='btn btn-default' data-role='prev'>« Назад</button>"+
                        "<button class='btn btn-default' data-role='next'>Вперед »</button>"+
                        "</div>"+
                        "<button class='btn btn-default' data-role='end'>Отмена</button>"+
                        "</div>"+
                        "</div>",

            debug: true,
            steps: [
                {
                    //path: "/",
                    element: "#start-tour",
                    placement: "bottom",
                    title: "Добро пожаловать в Интраворк!",
                    content: "Проследуйте вводной инструкции по интерфейсу нашего продукта."
                    /*backdrop: true,
                    backdropContainer: '#aaaaa'*/
                }, {
                    //path: "/demands/",
                    element: "#navbar-top",
                    placement: "bottom",
                    title: "Главная панель инструментов",
                    content: "В этой панеле расположены доступы ко всем функциям, соответствующим вашим ролям в системе."
                }, {
                    //path: "/demands/",
                    element: "#sidebar-nav",
                    placement: "right",
                    title: "Панель быстрого достпа",
                    content: "В этой панеле расположены ваши заявки, фильтры, категории заявок..."
                }, {
                    path: "/demands/?cnd[cat_id]=0&cnd[status][]=1&cnd[status][]=2&cnd[status][]=5",
                    element: "#sidebar-block-conditions",
                    placement: "bottom",
                    title: "Панель быстрого достпа",
                    content: "...а также текущие параметры отбора данных (заявок, пользователей, событий и тд.)"
                }, {
                    element: "#sidebar-block-demands-member ul ul",
                    placement: "bottom",
                    title: "Панель заявок",
                    content: "Здесь расположены пять последних заявок, в которых вы принимали участие..."
                }, {
                    element: "#sidebar-block-demands-member ul ul li:first-child",
                    placement: "bottom",
                    title: "Панель заявок",
                    content: "... где первой в списке является заявка, над которые вы в данной момент работаете."
                }, {
                    element: "#sidebar-block-categories",
                    placement: "top",
                    title: "Панель категорий заявок",
                    content: "Категории заявок в виде вложенного списка. Рядом с названием показано количество Новых заявок."
                }, {
                    path: "/users/",
                    element: "#users-table",
                    placement: "top",
                    title: "Списки",
                    content: "Большинство списков в системе состоят из двух частей, первая из которых отображает краткую основную информацию...",
                    onNext: function() {
                        $("#users-table tbody tr:first-child").click();
                    }
                }, {
                    element: "#users-view-pane",
                    placement: "left",
                    title: "Списки",
                    content: "...вторая детальную, и открывается по клику на элементе списка."
                }, {
                    element: ".ui-layout-resizer-east-open",
                    placement: "right",
                    title: "Списки",
                    content: "Вы можете настроить наиболее удобную для вас ширину этих панелей, двигая этот слайдер."
                }, {
                    path: "/categories/create/",
                    element: ".form-actions",
                    placement: "top",
                    title: "Формы",
                    content: "Все формы в Интраворке снабжены плавающей панелью, в которой вы можете применить действие, указать, что делать дальше..."
                }, {
                    element: ".form-actions .btn-form-reset",
                    placement: "top",
                    title: "Формы",
                    content: "...а также, сбросить данные формы до первоначального состояния."
                }


                /*

                , {
                    path: "/api",
                    element: "#options",
                    placement: "top",
                    title: "Flexibilty and expressiveness",
                    content: "There are more options for those who want to get on the dark side.<br>\nPower to the people!",
                    reflex: true
                }, {
                    path: "/api",
                    element: "#duration",
                    placement: "top",
                    title: "Automagically expiring step",
                    content: "A new addition: make your tour (or step) completely automatic. You set the duration, Bootstrap\nTour does the rest. For instance, this step will disappear in <em>5</em> seconds.",
                    duration: 5000
                }, {
                    path: "/api",
                    element: "#methods table",
                    placement: "top",
                    title: "A new shiny Backdrop option",
                    content: "If you need to highlight the current step's element, activate the backdrop and you won't lose\nthe focus anymore!",
                    backdrop: true
                }, {
                    path: "/api",
                    element: "#reflex",
                    placement: "bottom",
                    title: "Reflex mode",
                    content: "Reflex mode is enabled, click on the text in the cell to continue!",
                    reflex: true
                }, {
                    path: "/api",
                    title: "And support for orphan steps",
                    content: "If you activate the orphan property, the step(s) are shown centered in the page, and you can\nforget to specify element and placement!",
                    orphan: true,
                    onHidden: function() {
                        return window.location.assign("/");
                    }
                }
                */
            ]
        });

        $('body').bind('init.layout', function(event) {
            tour.init();
            tour.start();
        });

    $btn_start.on("click", function(e) {
        e.preventDefault();

        if ($(this).parent().hasClass("disabled")) {
            return;
        }

        tour.restart();
//        return false;
    });




        /*

        if (tour.ended()) {
            $('<div class="alert alert-info alert-dismissable"><button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You ended the demo tour. <a href="#" data-demo>Restart the demo tour.</a></div>').prependTo(".content").alert();
        }
        $(document).on("click", "[data-demo]", function(e) {
            e.preventDefault();
            if ($(this).hasClass("disabled")) {
                return;
            }
            tour.restart();
            return $(".alert").alert("close");
        });
        $("html").smoothScroll();

        */
//    });


