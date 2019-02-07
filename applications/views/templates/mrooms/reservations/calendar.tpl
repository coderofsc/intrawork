<script src="min/?g=fullcalendarjs"></script>
<link rel="stylesheet" href="min/?g=fullcalendarcss">

{if $smarty.const.LANG_CURRENT == "ru"}
    <script type="text/javascript" src="resources/js/jquery/plugin/fullcalendar/js/lang/ru.js"></script>
{else}
    <script type="text/javascript" src="resources/js/jquery/plugin/fullcalendar/js/lang/en-au.js"></script>
{/if}


<div id="reservations-calendar"></div>

<script>
    var current_mroom_id = {$mroom_id|intval};

   function move_event(event, delta_start, delta_end) {
       $.ajax({
           url: 'mrooms/reservations/move_events/?mrr_id='+event.id,
           type: 'get',
           dataType: 'json',
           data: {
               delta_start : delta_start,
               delta_end   : delta_end
           },
           success: function(response) {
               if (response.status == 200) {
                   toastr.success('{L::toastr_mrooms_changetime_message}');
               }
           }
       });
   }

	$('body').bind('init.layout', function(event){
		$("#reservations-calendar").fullCalendar({

                /*lang: '{$smarty.const.LANG_CURRENT}',*/

			events: function(start, end, timezone, callback) {

                $("#reservations-calendar").find(".fc-center").stop(true, true).show().html('<i class="fa fa-spinner fa-spin"></i>');

				$.ajax({
					url: 'mrooms/reservations/get_events/?mroom_id='+current_mroom_id,
					type: 'get',
					dataType: 'json',
					data: {
						start   : start.unix(),
						end     : end.unix(),
						mroom_id: current_mroom_id
					},
					success: function(response) {
						callback(response.data);
                        $("#reservations-calendar").find(".fc-center").fadeOut(function () {
                            $(this).empty().html('<span class="badge badge-info">'+response.data.length+'</span>').fadeIn(function () {
                                var events_status = this;
                                setTimeout(function () {
                                    $(events_status).fadeOut(function() { $(this).empty().show()});
                                }, 1000);
                            });
                        });
					}
				});
			},

			header: {
				left: 'prev,next today',
				right: 'title'
				/*right: 'month,agendaWeek,agendaDay'*/
			},
			defaultView: 'agendaWeek',
			height:'auto',

            {*{if $editable}editable: true,{/if}
            {if $selectable}selectable: true,{/if}*}
            editable: true,
            selectable: true,

            {literal}
            eventDrop: function(event, delta, revertFunc) {
                bootbox.confirm({title: "{/literal}{L::confirm_mroomsres_move_title}{literal}", "message": "{/literal}{L::confirm_mroomsres_move_message}{literal}".replace('%name%', event.title).replace('%time%', event.start.format()), callback: function(r) {
                    if (!r) {
                        revertFunc();
                    } else {
                        move_event(event, delta.asSeconds(), delta.asSeconds());
                    }
                }});
            },

            eventResize: function(event, delta, revertFunc) {
                bootbox.confirm({title: "{/literal}{L::confirm_mroomsres_move_title}{literal}", "message": "{/literal}{L::confirm_mroomsres_move_message}{literal}".replace('%name%', event.title).replace('%time%', event.start.format()), callback: function(r) {
                    if (!r) {
                        revertFunc();
                    } else {
                        move_event(event, 0, delta.asSeconds());
                    }
                }});
            },

            {/literal}

			select: function(start, end, allDay) {

				/*
				 //http://momentjs.com/docs/#/displaying/format/
				 console.log(start.format('h:mm tt'), end);
				 */


                {if $modal}
                {literal}
                    $('#modal-remote').modal({remote: 'mrooms/reservations/create/?mrr_data[mroom_id]='+current_mroom_id+'&mrr_data[unix_start]='+start.unix()+'&mrr_data[unix_end]='+end.unix()+'&pane=0'});
                {/literal}
                {else}
                    $("#mroom_reservations_form").find(".start_datetime input:text").parent().datetimepicker('update', start.format('DD/MM/YYYY HH:mm'));
                    $("#mroom_reservations_form").find(".end_datetime input:text").parent().datetimepicker('update', end.format('DD/MM/YYYY HH:mm'));
                    toastr.success('{L::toastr_mrooms_setinterval_message}', '{L::toastr_mrooms_setinterval_title}');
                {/if}

			},

			businessHours: {
				start: '10:00',
				end: '19:00',

				dow: [ 1, 2, 3, 4, 5 ]
			},

			weekends: false,

			minTime: '10:00',
			maxTime: '19:00'

		});
	});

</script>
