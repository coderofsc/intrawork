var m_p_observer = {

	m_p_win		        : null,
	m_p_not_read_message_area	: "a.count-info[href=#mp-modal] span.label",
	m_p_not_read_message_cnt	    : "a.count-info[href=#mp-modal] span.label",
	win_focus		    : true,

    title_page		    : document.title,
    blink_title_page_timer  :null,
    blink_title_page_status: 1,


        options: { delay:500, blur_delay: 1000 },
	
	reminder_m_p_win: function(descript) {
		m_p_observer.m_p_win = descript;
	},
	
	chk_nm	    : null,
	blink		: false,

    blink_title_page: function () {
        if (m_p_observer.blink_title_page_status) {
            document.title = "Новое сообщение";
            m_p_observer.blink_title_page_status = 0;
        } else {
            document.title = m_p_observer.title_page;
            m_p_observer.blink_title_page_status = 1;
        }
    },
	
	check_nm_response: function (response)
	{
		//var new_count = response.max_item;
		//var insert_count = 0;
		var cur_msg_count = parseInt($(m_p_observer.m_p_not_read_message_cnt).html());
        //alert(cur_msg_count);
		//var new_items = new Array();
		//var new_item_count = 0;
		
		var not_read = response.items.length;

        //alert(not_read);
		
		if (response.items.length != 0 /*&& m_p_observer.m_p_win != null && m_p_observer.m_p_win.m_p.id_cur_thread != undefined*/) {
			
			if (m_p_observer.m_p_win != null) {
				var m_p = m_p_observer.m_p_win.m_p;
				var dialog_start_ts 	= m_p.dialog_start_ts;
			}

			$.each(response.items, function(i, item) {
				
				// Если открыто окно и есть новые письма (не повторная проверка)
				if (m_p_observer.m_p_win != null /*&& new_items.length != 0*/) {
					// проверка на наличие треда в списке (был ли уже диалог?)
					if ($("#thread-"+item.thread_id, m_p_observer.m_p_win.document).length) {

						// инкрементируем кол-во сообщение если если тред не активен
						if (m_p.id_cur_thread != item.thread_id) {
							var thread_msg_count = parseInt($("#thread-"+item.thread_id+" .badge", m_p_observer.m_p_win.document).html());
                            if (isNaN(thread_msg_count)) thread_msg_count = 0;
							$("#thread-"+item.thread_id+" .badge", m_p_observer.m_p_win.document).html(thread_msg_count+1);
						}
						
						// перемещаем тред вверх списка
						$("#thread-list", m_p_observer.m_p_win.document).prepend($("#thread-"+item.thread_id, m_p_observer.m_p_win.document));
						
					} else {
						// если нет треда -- добавляем
						var thread = response.nr_in_thread[item.thread_id];
						m_p_observer.m_p_win.m_p.add_thread_in_place(thread, 1, true);
					}
				}
				
				if (m_p_observer.m_p_win != null && m_p.id_cur_thread == item.thread_id /*&& item.cdate_ts > dialog_start_ts*/) {
					m_p.add_message_in_list(item);
					not_read--;
				}
			});
		}
		
		$.each(response.items, function(i, item) {
            $.bootstrapGrowl('Получено новое сообщение от пользователя '+item.sender_name+'.', {type: 'success'});
		});		
		
		if (not_read)  {
			if (m_p_observer.blink == false) {
                $(m_p_observer.m_p_not_read_message_area).blink();
                m_p_observer.blink = true;
            }

            if (!m_p_observer.win_focus && !m_p_observer.blink_title_page_timer) {
                m_p_observer.blink_title_page_timer = setInterval('m_p_observer.blink_title_page()', 1000);
            }

			$(m_p_observer.m_p_not_read_message_cnt).show().html(parseInt(not_read+cur_msg_count));
		}
		else if (cur_msg_count == 0) {
			//$(m_p_observer.m_p_not_read_message_area).unblink(); !!!!!!!!!!!!!!!!!!!!!!!! ВКЛЮЧИТЬ
			m_p_observer.blink = false;
            $(m_p_observer.m_p_not_read_message_cnt).hide()
		}
	},
	
	check_new_message: function ()
	{
		var id_cur_thread 	= 0;
		var dialog_start_ts 	= 0;
		
		if (m_p_observer.m_p_win != null && m_p_observer.m_p_win.m_p.id_cur_thread != undefined) {
			id_cur_thread 		= m_p_observer.m_p_win.m_p.id_cur_thread;
			dialog_start_ts 	= m_p_observer.m_p_win.m_p.dialog_start_ts;
		}
		
		/*$.getJSON("ajax_points/thread/get_messages.php",
			{"new_only":		1, 
			"not_read": 		1, 
			"id_cur_thread":	id_cur_thread, 
			"min_ts": 		dialog_start_ts	}, m_p_observer.check_nm_response);*/

        $.ajax({
            type: "get",
            url: "ajax_points/thread/get_messages.php",
            global: false,
            data: {"new_only":		1,
                    "not_read": 		1,
                    "id_cur_thread":	id_cur_thread,
                    "min_ts": 		dialog_start_ts	},
            dataType: "json",
            success: m_p_observer.check_nm_response
        });

	},
	
	
	init: function(options) 
	{
		m_p_observer.options = $.extend(m_p_observer.options, options);

        m_p_observer.check_new_message();
        m_p_observer.chk_nm = setInterval('m_p_observer.check_new_message()', options.delay);

		/*$(window).focus(function() 	{
            m_p_observer.win_focus = true;
            if (m_p_observer.chk_nm) {
                clearInterval(m_p_observer.chk_nm);
            }

            if (m_p_observer.blink_title_page_timer) {
                clearInterval(m_p_observer.blink_title_page_timer);
            }

            m_p_observer.chk_nm = setInterval('m_p_observer.check_new_message()', options.delay);
        });

		$(window).blur(function() 	{
            m_p_observer.win_focus = false;

            if (m_p_observer.chk_nm) {
                clearInterval(m_p_observer.chk_nm);
            }
            m_p_observer.chk_nm = setInterval('m_p_observer.check_new_message()', options.blur_delay);

        });
        $(window).focus();*/


		var cur_msg_count = parseInt($(m_p_observer.m_p_not_read_message_cnt).html());

		if (cur_msg_count) {
			$(m_p_observer.m_p_not_read_message_area).blink(); m_p_observer.blink = true;
		 }
		
	}
};
