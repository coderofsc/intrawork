var M_P_APPEND 	= 0;
var M_P_PREPEND 	= 1;

var m_p = {

    current_user_id : 0,
	id_cur_thread	: 0,
	id_cur_rcpt		: 0,
	message		    : null,
	msg_redactor	: null,
	max_msg_item 	: 0,
	show_msg_item 	: 0,
	load_rows 		: 2,
	direction 		: M_P_APPEND, // 0 - после (append), 1 - до (prepend)
	
	create_dateObj_last 	: null,
	
	dialog_start_ts 	: Math.round((new Date()).getTime() / 1000),

    init_status     :false,

	/***********************************************************
	* Окончательная подготовка блока нового треда
	***********************************************************/
	
	complete_new_thread: function(item)
	{
		//$("#thread-new").find(".thread_item").attr("thread", m_p.id_cur_thread);
		//$("#thread-new").find("#thread-new_count_msg").attr("id", "thread-"+m_p.id_cur_thread+"_count_msg");
		//$("#thread-new").find("#thread-new_load").attr("id", "thread-"+m_p.id_cur_thread+"_load");
		//$("#thread-new").find("#thread-new_cdate").attr("id", "thread-"+m_p.id_cur_thread+"_cdate").html(item.cdate);
		//$("#thread-new").find("#thread-new_rcpt_name").attr("id", "thread-"+m_p.id_cur_thread+"_rcpt_name");
		
		$("#thread-new").attr("id", "thread-"+m_p.id_cur_thread);
	},
	
	/***********************************************************
	* Добавление сообщения в список
	***********************************************************/
	
	add_message_in_list: function(item)
	{
		if (m_p.show_msg_item == 0) {
            $("#message-empty").remove();
            m_p.complete_new_thread(item);
		}

        //alert(item);
        //console.log(item);
		
		var datetime_obj = new Date(item.cdate_ts*1000);
		var date_obj = new Date(datetime_obj.getFullYear(), datetime_obj.getMonth(), datetime_obj.getDate(), 0,0,0);				
		m_p.check_date_separation(datetime_obj);
		var item_buffer = m_p.construct_msg_item(item);
		
		$("#day-container-"+date_obj.getTime()).append(item_buffer);

        $("#msg-item-"+item.id).hide().fadeIn(500);
		
		m_p.colour_messages();
		m_p.check_more();
        m_p.reinit_nano_scroller();
		
		m_p.show_msg_item++;
		
		$("#messages-container > div.nano-content").scrollTo('max', 500);
	},
	
	/***********************************************************
	* Отправка серверу нового сообщения
	***********************************************************/
	
	add_thread_message: function ()
	{
		m_p.message 	= $("textarea", $("#messages-form")).val();//m_p.msg_redactor.data('wbb').getBBCode();
		
		$("#send-message", $("#messages-form")).button("loading");

		$.ajax({
			type: "post",
			url: "ajax_points/thread/add_message.php",
			data: {thread_id:m_p.id_cur_thread, message:m_p.message, rcpt_id:m_p.id_cur_rcpt},
			dataType: "json",
			success: m_p.check_add_response
		});
	},
	
	/***********************************************************
	* Проверка результата добавления сообщения в список
	***********************************************************/
	
	check_add_response: function (message)
	{
		if (!message.status) {
			//show_message("Ошибка", response.message, "error", "", 10000);
            //$.bootstrapGrowl(message.message, {type: 'danger', align:'right', offset: {from: 'top', amount: 60}});
            $.bootstrapGrowl(message.message, {type: 'danger'});
		}
		else {
			m_p.id_cur_thread = message.thread_id;
			m_p.add_message_in_list(message);
            //$.bootstrapGrowl("Сообщение отправлено", {type: 'success'});
			//m_p.msg_redactor.data('wbb').$body.html("");
            $("textarea", $("#messages-form")).val('');
		}

        $("#send-message", $("#messages-form")).button("reset");
	},
	
	/***********************************************************
	* Вывод формы ввода сообщения
	***********************************************************/
	
	append_message_from: function ()
	{
        $('#messages-form').removeClass("invisible").find("textarea").val('');
	},
	
	reset_panel: function ()
	{
		m_p.id_cur_thread 	= 0;
		m_p.id_cur_rcpt 	= 0;
		m_p.max_msg_item 	= 0;
		m_p.show_msg_item 	= 0;
		m_p.direction 		= 0;

        $('#messages-form').addClass("invisible");

		$("#messages-container > div.nano-content").empty().append("Выберите пользователя для диалога.");
		$("#messages-title").empty().append("Сообщения");
		$("#messages-toolbar").addClass("hidden");
	},
	
	/***********************************************************
	* Удаление диалога
	***********************************************************/
	
	delete_thread: function ()
	{
		/*jConfirm('Вы действительно хотите удалить этот диалог?', 'Удалить диалог', function(r) {  if (r==true) m_p.delete_thread_confirmed();  } ); return false;*/

        call_dialog.confirm({message: "Вы действительно хотите удалить этот диалог?", title: "Удаление диалога", callback: function(result) {

            if (result) {
                m_p.delete_thread_confirmed();
            }
        }});

	},
	
	delete_thread_confirmed: function ()
	{
		////ajax_show_loader("thread_"+m_p.id_cur_thread+"_load");
		$.getJSON("ajax_points/thread/delete_thread.php?thread_id="+m_p.id_cur_thread+"&cache=" + new Date().getTime(),
		function(response) {
            if (response.status == 1) {
                $('#thread-'+m_p.id_cur_thread).remove();
                m_p.check_empty_thread();
                m_p.reset_panel();
                //$.bootstrapGrowl("Диалог успешно удален.");
            } else {
                $.bootstrapGrowl("Произошла ошибка. Диалог не удален.", {type: 'danger'});
            }
		});
	},
	
	/***********************************************************
	* Очистка диалога
	***********************************************************/
	
	clear_thread: function ()
	{
        call_dialog.confirm({message: "Вы действительно хотите удалить все сообщени в этом диалоге?", title: "Очистить диалог", callback: function(result) {

            if (result) {
                m_p.clear_thread_confirmed();
            }
        }});
	},
	
	clear_thread_confirmed: function ()
	{
        $.getJSON("ajax_points/thread/clear_thread.php?thread_id="+m_p.id_cur_thread+"&cache=" + new Date().getTime(),
             function(response) {
                 if (response.status == 1) {
                     m_p.show_msg_item = 0;
                     m_p.check_empty();
                     //$.bootstrapGrowl("Диалог успешно очищен.");
                     //ajax_hide_loader("thread_"+m_p.id_cur_thread+"_load");
                 } else {
                     $.bootstrapGrowl("Произошла ошибка. Диалог не очищен.", {type: 'danger'});
                 }
         });

	},
	
	delete_message_confirmed: function (message_id)
	{
		//ajax_show_loader("thread_"+m_p.id_cur_thread+"_load");
		
		$.getJSON("ajax_points/thread/delete_message.php?thread_id="+m_p.id_cur_thread+"&message_id="+message_id+"&cache=" + new Date().getTime(),
		function(result) {

            if (result.status == 1) {

                var cdate_ts = $("#msg-item-"+message_id).attr("cdate_ts");

                $("#msg-item-"+message_id).slideUp(500, function() { $(this).remove(); });

                if (!$('.msg-item[cdate_ts='+cdate_ts+']').length) {
                    $("#day-container-"+cdate_ts).remove();
                }

                m_p.show_msg_item--;
                var old_load_rows = m_p.load_rows;
                m_p.load_rows = 1;
                m_p.load_thread_messages(m_p.id_cur_thread);
                m_p.load_rows = old_load_rows;
                m_p.check_more();
                m_p.reinit_nano_scroller();
                //$.bootstrapGrowl("Сообщение успешно удалено.");
            } else {
                $.bootstrapGrowl("Произошла ошибка. Сообщение не удалено.", {type: 'danger'});

            }
		});
	},
	
	delete_message: function (message_id)
	{
        call_dialog.confirm({message: "Вы действительно хотите удалить это сообщение?", title: "Удаление сообщения", callback: function(result) {

            if (result) {
                m_p.delete_message_confirmed(message_id);
            }

        }});

        return false;
	},
	
	construct_sep_item: function (date_obj)
	{
		return m_p_items.construct_sep_item(date_obj);
	},
	
	construct_msg_item: function (item)
	{
        var dir = (item.sender_id == m_p.current_user_id)?"right":"left";
		return m_p_items.construct_msg_item(item, dir);
	},
	
	construct_thread_item: function (item)
	{
		return m_p_items.construct_thread_item(item);
	},
	
	load_more_prev: function ()
	{
		m_p.load_thread_messages(m_p.id_cur_thread);
	},
	
	/***********************************************************
	* Очистка панели сообщений
	***********************************************************/
	
	empty_message_panel: function (loading)
	{
		//var buffer = '<div id="message-empty" class="alert alert-info">Нет сообщений</div>';
		//$("#messages-container > div.nano-content").empty().append(buffer).append('<ul class="media-list"></ul>');

        if (loading == undefined) {
            var buffer = '<div id="message-empty" class="alert alert-default">Нет сообщений</div>';
        } else {
            var buffer = '<div id="message-empty" class="alert alert-default">Подождите, идет загрузка диалога...</div>';
        }


        $("#messages-container > div.nano-content").empty().append(buffer);

		m_p.create_dateObj_last = null;
	},
	
	check_more: function ()
	{
		if (m_p.max_msg_item > m_p.show_msg_item) {
			$("#messages-toolbar .load-more-messages").show();
		} else {
			$("#messages-toolbar .load-more-messages").hide();
		}
		
		/*
		if (m_p.max_msg_item > m_p.load_rows) {
			if (m_p.show_msg_item != m_p.max_msg_item) {
				$("#tool_messages_more").show();
			}
		}
		*/
	},
	
	check_empty: function ()
	{
		if (!m_p.show_msg_item) { 
			m_p.empty_message_panel();
			$("#messages-toolbar .clear-thread").hide();
            m_p.reinit_nano_scroller();
		}
		else {
			$("#messages-toolbar .clear-thread").show();
            $("#message-empty").remove();
		}
	},
	
	check_empty_thread: function ()
	{
		if ($('#thread-list .list-group-item').length == 0) {
			$('#thread-list').append("Нет диалогов");
		}
	},
	
	add_thread_in_place: function (item, way, b_new)
	{
		// Если первый диалог, то очищаем область диалогов
		if ($('#thread-list .list-group-item').length == 0 && b_new == true) {
			$("#thread-list").empty();
		}
		
		var item_buffer = m_p.construct_thread_item(item);

		if (way == 0)
			$(item_buffer).appendTo($("#thread-list")).click(function() { m_p.thread_run(item.id, item.real_recipient_id); return false; });
		else
			$(item_buffer).prependTo($("#thread-list")).click(function() { m_p.thread_run(item.id, item.real_recipient_id); return false; });
			
		if (item.selected) {
			m_p.thread_run(item.id, item.real_recipient_id);
		}
	},
	
	fill_threads_place: function (items)
	{
		$("#thread-list").empty();
		
		if (items.length != 0)
		{
			$.each(items, function(i, item) {
				m_p.add_thread_in_place(item, 0, false);
			});
		}
		
		m_p.check_empty_thread();
		
	},
	
	/***********************************************************
	* Заполнение панели сообщений
	***********************************************************/
	
	check_date_separation: function (datetime_obj) {
		
		var date_obj = new Date(datetime_obj.getFullYear(), datetime_obj.getMonth(), datetime_obj.getDate(), 0,0,0);
		
		var day_container = 'day-container-'+date_obj.getTime();
		
		if(!$('#'+day_container).length) {
			
			var container_buffer = '<ul class="media-list" id="'+day_container+'" date="'+date_obj.getTime()+'"></ul>';
			
			if (m_p.direction == 0)
				$("#messages-container > div.nano-content").append(container_buffer);
			else
				$("#messages-container > div.nano-content").prepend(container_buffer);
			
			var item_buffer = m_p.construct_sep_item(date_obj);

			$('#'+day_container).append(item_buffer);
		}
		
		/*var ar_months = new Array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентярбя", "октября", "ноября", "декабря");
		
		
		
		if (!m_p.create_dateObj_last || create_dateObj.getTime() != m_p.create_dateObj_last.getTime()) {

			var sep_buffer = '<li id="sep_'+create_dateObj.getTime()+'" class="sep_item">';
			sep_buffer+='<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0px;">';
				sep_buffer+='<td nowrap="" align="left">'+create_datetimeObj.getDate()+' '+ar_months[create_datetimeObj.getMonth()]+' '+create_datetimeObj.getFullYear()+'</td>';
				sep_buffer+='<td width="100%"><hr></td>';
			sep_buffer+='</table>';
			sep_buffer+='</li>';
			
			if (m_p.direction == 0)
				$(sep_buffer).appendTo($("#messages-container > div.nano-content").children('ul'));
			else
				$(sep_buffer).prependTo($("#messages-container > div.nano-content").children('ul'));
	
			m_p.create_dateObj_last = create_dateObj;
		};
		*/
	},
	
	decrement_count_msg: function(thread_id) 
	{
		var new_count_msg = parseInt($("#thread-"+thread_id+" .badge").html());
        if (isNaN(new_count_msg)) new_count_msg = 0;
		new_count_msg = parseInt(new_count_msg-1);		
		if (new_count_msg < 0) new_count_msg = 0;

        if (new_count_msg == 0) {
            $("#thread-"+thread_id+" .badge").empty();
        } else {
            $("#thread-"+thread_id+" .badge").html(new_count_msg);
        }

		
		var cur_msg_count = parseInt($(m_p_observer.m_p_not_read_message_cnt, window.parent.document).html());
		cur_msg_count = parseInt(cur_msg_count-1);		
		if (cur_msg_count < 0) cur_msg_count = 0;		
		$(m_p_observer.m_p_not_read_message_cnt, window.parent.document).html(cur_msg_count);
	},
	
	fill_thread_message_place: function (items)
	{
		var item_buffer;
		if (m_p.direction == 0) {
			//$("#messages-container > div.nano-content").empty().append('<ul></ul>');
		}	
		
		$.each(items, function(i, item)
		{
			var datetime_obj = new Date(item.cdate_ts*1000);
			var date_obj = new Date(datetime_obj.getFullYear(), datetime_obj.getMonth(), datetime_obj.getDate(), 0,0,0);				
			m_p.check_date_separation(datetime_obj);
			var item_buffer = m_p.construct_msg_item(item);
			
			if (item.read == 0)  {
				m_p.decrement_count_msg(m_p.id_cur_thread);
            }
			
			if (m_p.direction == 0)
				$("#day-container-"+date_obj.getTime()).append(item_buffer);
			else
				$("#day-container-"+date_obj.getTime()+" li.day-separator").after(item_buffer);
				
				
			 m_p.show_msg_item++;
		});
		m_p.check_more();
		m_p.check_empty();
		m_p.colour_messages();
        m_p.reinit_nano_scroller();
	},
	
	/***********************************************************
	* Загрузка списка сообщений с сервера
	************************************************************/
	
	colour_messages: function (){
		
		/*$("#messages-container > div.nano-content li.msg-item").css("background-color", "");
		$("#messages-container > div.nano-content li.msg-item:even").css("background-color", "#f9f9f9");*/
	},
	
	
	load_thread_messages: function (thread_id)
	{
		//ajax_show_loader("thread_"+thread_id+"_load");
		
		//$.getJSON("ajax_points/thread/get_messages.php?thread_id="+thread_id+"&offset="+m_p.show_msg_item+"&rows="+m_p.load_rows+"&cache=" + new Date().getTime(),
		$.getJSON("ajax_points/thread/get_messages.php?thread_id="+thread_id+"&offset="+m_p.show_msg_item+"&rows=10&cache=" + new Date().getTime(),
		function(data)
		{
			m_p.max_msg_item = data.max_item;
			m_p.fill_thread_message_place(data.items);
			

            //$.bootstrapGrowl("Сообщения загружены.");

			if (m_p.direction == 0) {
				$("#messages-container > div.nano-content").scrollTo('max', 200);
			}
			
			m_p.set_title();
			m_p.direction++;
			
			window.parent.m_p_observer.check_new_message();
		});
	},
	
	/***********************************************************
	* Запуск процесса загрузки сообщений
	************************************************************/
	
	hnd_rld_msglist: null, 
	
	set_title: function ()
	{
		var user_name = $("#thread-"+m_p.id_cur_thread+" .user-name").html();

		$("#messages-title").html("Переписка с "+user_name);
		
		if (m_p.id_cur_thread != "new") {
			$("#messages-toolbar").removeClass("hidden");
		}
	},
	
	thread_run: function (thread_id, rcpt_id) 
	{
		if (m_p.id_cur_thread != thread_id) {
			m_p.id_cur_rcpt 	= 0;
			m_p.max_msg_item 	= 0;
			m_p.show_msg_item 	= 0;
			m_p.direction 		= 0;
			
			m_p.empty_message_panel(true);
			
			if (thread_id != "new") {
				m_p.load_thread_messages(thread_id);
			}


			$("#thread-"+m_p.id_cur_thread).removeClass("active");
			$("#thread-"+thread_id).addClass("active");
			m_p.id_cur_thread = thread_id;	
			m_p.id_cur_rcpt = rcpt_id;

			m_p.append_message_from();
		}
	},


    reinit_nano_scroller: function() {
        $("#mp-modal .nano").nanoScroller();
    },

	init: function(current_user_id) {

        m_p.current_user_id = current_user_id;

        $(window).resize(function() {
            var height_form = $("#messages-form").height();
            var height_body = $("#mp-modal .modal-body").height();
            $("#messages-container").height(height_body-height_form-25);
            $("#thread-list").height(height_body);
            m_p.reinit_nano_scroller();
        }).resize();

        window.parent.m_p_observer.m_p_win = window.self;

        $(window.self).unload(function() { window.parent.m_p_observer.m_p_win = null; });

        $("textarea", $("#messages-form")).keydown(function (e) {
            if (e.ctrlKey && (e.keyCode == 0xA || e.keyCode == 0xD)) {
                $('#send-message').button('loading'); m_p.add_thread_message();
            }
        });

        $('#send-message').on('click',function() { $(this).button('loading'); m_p.add_thread_message(); });

        m_p.init_status = true;
	},

    hide: function() {
        $(document).unbind("ajaxSend").unbind("ajaxComplete");
    },

    show: function() {
        $(document).bind("ajaxSend", function(){ $("#mp-loading").show(); }).bind("ajaxComplete", function(){ $("#mp-loading").hide(); });
    },

    main: function(current_rcpt) {

        m_p.show();
        m_p.reset_panel();


        $.getJSON("ajax_points/thread/get_threads.php?current_rcpt="+current_rcpt+"&cache=" + new Date().getTime(),
        function(data)
        {
            m_p.fill_threads_place(data.items);
        });
    }
};

