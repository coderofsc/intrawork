<script src="min/?g=fullcalendarjs"></script>
<link rel="stylesheet" href="min/?g=fullcalendarcss">

{if $smarty.const.LANG_CURRENT == "ru"}
    <script type="text/javascript" src="resources/js/jquery/plugin/fullcalendar/js/lang/ru.js"></script>
{else}
    <script type="text/javascript" src="resources/js/jquery/plugin/fullcalendar/js/lang/en-au.js"></script>
{/if}


<style>
    .fc-event {
        font-size: 0;
        overflow: hidden;
        height: 18px;
        width: 20px;
        padding:2px;
        cursor: pointer;
        line-height: 1;
    }

    .fc-event .fc-bg:after {
        content: "1";
        position: absolute;
        left: 0;
        right: 0;
    }
</style>


<div class="{*container-fluid pane-content*}" id="demands-calendar">
</div>


<script>

	$('body').bind('init.layout', function(event){

	$("#demands-calendar").fullCalendar({
        slotEventOverlap: true,

        eventRender: function(event, element) {

            $(element).find(".fc-content").html("<i class='fa fa-fw fa-"+event.icon+"'></i>").css({
                'font-size': '16px'
            });
        },

        eventClick: function (event) {

            var message = event.message;
            message = '<p>'+message+'</p>';
            if (event.url) {
                message+='<br/><p><a class="btn btn-default" href="'+event.url+'">Посмотреть детали объекта</a></p>';

            }

            bootbox.alert({ message: message, title: event.title});

            return false;
        },

		events: function(start, end, timezone, callback) {



            $("#demands-calendar").find(".fc-center").stop(true, true).show().html('<i class="fa fa-spinner fa-spin"></i>');

			$.ajax({
				url: 'dashboard/get_events/',
				type: 'get',
				dataType: 'json',
				data: {
					start   : start.format(),
					end     : end.format()
				},
				success: function(response) {
					callback(response.data);

                    $("#demands-calendar").find(".fc-center").fadeOut(function () {
                        $(this).empty().html('<span class="badge badge-info">'+response.data.length+'</span>').fadeIn(function () {
                            var events_status = this;
                            setTimeout(function () {
                                ///$(events_status).fadeOut(function() { $(this).empty().show()});
                            }, 1000);
                        });
                    });

				}
			});
		},

		header: {
			left: 'prev,next today',
			right: 'title'
			//center: 'month,agendaWeek,agendaDay'
		},
		defaultView: 'agendaWeek',
		height:'auto',

		editable: false,
		selectable: false,

		businessHours: {
			start: '10:00',
			end: '19:00',

			dow: [ 1, 2, 3, 4, 5,6,7 ]
		},

		weekends: true

		//minTime: '10:00',
		//maxTime: '19:00'

	});

	});

</script>