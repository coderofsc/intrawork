var m_p_items = {

    construct_avatar_src: function (hash) {
        return 'file_storage/ava/'+hash.substring(0,2)+'/'+hash.substring(2,4)+'/'+hash.substring(4,6)+'/32/'+hash+'.jpg?'+Math.random();
    },
	
	construct_sep_item: function (date_obj) {
		
		var ar_months = new Array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентярбя", "октября", "ноября", "декабря");
		
		/*var buffer = '<li class="sep_item">';
		buffer+='<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0px;">';
			buffer+='<td nowrap="" align="left">'+date_obj.getDate()+' '+ar_months[date_obj.getMonth()]+' '+date_obj.getFullYear()+'</td>';
			buffer+='<td width="100%"><hr></td>';
		buffer+='</table>';
		buffer+='</li>';*/

        var buffer = '<li class="day-separator"><span>'+date_obj.getDate()+' '+ar_months[date_obj.getMonth()]+' '+date_obj.getFullYear()+'</span></li>';
		
		return buffer;
	},
	
	construct_msg_item: function (item, dir) {

        if (dir == undefined) {
            dir = "left";
        }

		var buffer= '';
		var dateObj = new Date(item.cdate_ts*1000);
		var create_dateObj = new Date(dateObj.getFullYear(), dateObj.getMonth(), dateObj.getDate(), 0,0,0);

        buffer+='<li id="msg-item-'+item.id+'" class="media msg-item '+dir+'" data-id="'+item.id+'" cdate_ts="'+create_dateObj.getTime()+'"  >';
            buffer+='<a href="#" class="avatar">';
            if (item.sender_avatar != 0)
                buffer+='<img class="img-circle" src="'+m_p_items.construct_avatar_src(item.sender_hash)+'" style="width:40px;height:40px" align="absmiddle" border="0" />';
            else
                buffer+='<img class="img-circle" src="images/avatars/ava_default_40.jpg" style="width:40px;height:40px" align="absmiddle" border="0" />';

            //buffer+='<div>href</div>';
            buffer+='</a>';

            buffer+='<div class="media-body">';
                buffer+='<span class="arrow"></span>';
                buffer+='<div class="media-heading">';
                    buffer+='<a href="office/'+item.sender_name+'/">'+item.sender_name+'</a>';
                    buffer+=' <span class="small text-muted"><i class="fa fa-clock-o fa-fw"></i>'+dateObj.toLocaleTimeString()+'</span>';

                    buffer+='<div class="media-actions">';
                        buffer+='<button href="#" onclick="m_p.delete_message('+item.id+'); return false;"><i class="fa fa-times"></i></button>';
                    buffer+='</div>';
                buffer+='</div>';

                buffer+='<div class="media-message">';
                    buffer+=item.message;
                    //buffer+='<div class="small text-muted">'+dateObj.toLocaleTimeString()+'</div>';
                buffer+='</div>';
            buffer+='</div>';
        buffer+='</li>';



        /*
		buffer+='<li id="msg_item_'+item.id+'" class="msg_item" cdate_ts="'+create_dateObj.getTime()+'">';
			buffer+='<table width="100%" border="0">';
			buffer+='<tr>';
				buffer+='<td valign="top" align="center">';

				if (item.sender_avatar != 0)
					buffer+='<img class="user_avatar wait_load" src="images/avatars/ava_'+item.sender_id+'_32.jpg?'+Math.random()+'" height="32" width="32" align="absmiddle" border="0" />';
				else
					buffer+='<img class="user_avatar wait_load" src="images/avatars/ava_default_32.jpg" height="32" width="32"  border="0" />';
				buffer+='<br/><small><a target="_parent" target="_black" href="/office/'+item.sender_name+'/" target="parent">'+item.sender_name+'</a></small>';

				buffer+='</td>';

				buffer+='<td valign="top" width="100%"><small>'+dateObj.toLocaleTimeString()+'</small><br/>'+item.message+'</td>';
				buffer+='<td valign="top"><a onclick="m_p.delete_message('+item.id+'); return false;" href="#"><img src="/images/message_panel/icon_msg_delete.png" title="Удалить сообщение" border="0" /></a></td>';
			buffer+='</tr>';
			buffer+='</table>';
         buffer+='</li>';
			*/



		return buffer;
	},
	
	construct_thread_item: function (item) {
		var buffer= '';
		
		/*var img_avatar = 'images/avatars/ava_';
		
		if (item.real_recipient_avatar != 0)
			img_avatar+=item.real_recipient_id;
		else
			img_avatar+='default';
			
		img_avatar+='_32.jpg?'+Math.random();*/


        buffer+='<a id="thread-'+item.id+'" href="#" class="list-group-item '+((item.selected)?'active':'')+'">';

        if (item.real_recipient_avatar != 0)
            buffer+='<img class="img-responsive img-circle pull-left" src="'+m_p_items.construct_avatar_src(item.real_recipient_hash)+'" style="width:32px;height:32px" />';
        else
            buffer+='<img class="img-responsive img-circle pull-left" src="images/avatars/ava_default_32.jpg" style="width:32px;height:32px"  border="0" />';

        buffer+='<div class="pull-left">';
            buffer+='<div class="user-name">'+item.real_recipient_name+'</div>';
            /*buffer+='<div class="user-rating">';
                buffer+='<small class="text-danger">-'+item.rate_hi+'</small>';
                buffer+='<small class="text-warning">&plusmn;'+item.rate_mid+'</small>';
                buffer+='<small class="text-success">+'+item.rate_low+'</small>';
            buffer+='</div>';*/
            buffer+= '<div class="star-rating">';
                buffer+= '<i class="fa fa-star"></i>';
                buffer+= '<i class="fa fa-star"></i>';
                buffer+= '<i class="fa fa-star"></i>';
                buffer+= '<i class="fa fa-star"></i>';
                buffer+= '<i class="fa fa-star-o"></i>';

                buffer+= ' <small class="rating-assessment">946.1</small>';
                buffer+= ' <small class="rating-down-c"><i class="fa fa-thumbs-o-up"></i> 36</small>';
                buffer+= ' <small class="rating-down-c"><i class="fa fa-thumbs-o-down"></i> 0</small>';

            buffer+= '</div>';

        buffer+='</div>';
        if (item.nm_count == 0) {
            buffer+='<span class="badge pull-right"></span>';
        } else {
            buffer+='<span class="badge pull-right">'+item.nm_count+'</span>';
        }

        buffer+='<div class="clearfix"></div>';
        buffer+='</a>';

        return buffer;



        /*
		buffer+='<li id="thread_'+item.id+'" class="thread">';
			buffer+='<div class="thread_item" thread="'+item.id+'" id_rcpt="'+item.real_recipient_id+'">';
			
				buffer+='<table cellpadding="0" cellspacing="0" border="0">';
				buffer+='<tr>';
					buffer+='<td>';
						buffer+='<div class="user_avatar_status">';
						buffer+='<a href="/office/'+item.real_recipient_name+'/" target="_parent">';
							buffer+='<img class="user_avatar wait_load" src="'+img_avatar+'" width="32" height="32" border="0" title="'+item.real_recipient_name+'" align="absmiddle" />';
							buffer+='<div title="На сайте" class="user_status user_online">&nbsp</div>';
						buffer+='</a>';
						buffer+='</div>';
					buffer+='</td>';
					buffer+='<td width="100%">';
						buffer+='<a target="_parent" href="/office/'+item.real_recipient_name+'/">'+item.real_recipient_name+'</a>';
						buffer+='<div class="thread_load_action" id="thread_'+item.id+'_load"></div><br/>';	
						buffer+='<img align="absmiddle" src="/images/rate_circle_red_x16.png" height="16" width="16" alt=":(" title="Плохо" />&nbsp;<a href="/review/'+item.real_recipient_name+'/?rate=low">'+item.rate_low+'</a>&nbsp;';
						buffer+='<img align="absmiddle" src="/images/rate_circle_orange_x16.png" height="16" width="16" alt=":|" title="Так себе" />&nbsp;<a href="/review/'+item.real_recipient_name+'/?rate=mid">'+item.rate_mid+'</a>&nbsp;';
						buffer+='<img align="absmiddle" src="/images/rate_circle_green_x16.png" height="16" width="16" alt=":)" title="Отлично" />&nbsp;<a href="/review/'+item.real_recipient_name+'/?rate=hi">'+item.rate_hi+'</a>&nbsp;';
					buffer+='</td>';
					buffer+='<td valign="middle">';
						buffer+='<div id="thread_'+item.id+'_count_msg">'+item.nm_count+'</div>';
					buffer+='</td>';
				buffer+='</tr>';
				buffer+='</table>';
			buffer+='</div>';
		buffer+='</li>';

         return buffer;
		*/
		
		

	}
}