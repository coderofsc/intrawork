/////////////////////////////////////////////////////////////////////
// Работа с фильтром
/////////////////////////////////////////////////////////////////////
function get_prop_handler()
{
    var idp = $("#select_props").val();
    var idc = $('#class_list').val();

    if (idp == 0)
    {
        show_message("Ошибка!", "Укажите свойство класса!", "", "error", 8000);
        $("#div_prop_value").html('Укажите свойство');
        return false;
    }

    ap_showWaitMessage(1);
    $.ajax({
        type: "POST",
        url: "../ajax_points/get_prop_handler.php",
        data: "idp="+idp,
        cache: false,
        success: function(result)
        {
            ap_showWaitMessage(0);
            $("#div_prop_value").empty();
            $("#div_prop_value").append(result);
            var prop_value = $('#prop_name_'+idc+'_'+idp).attr("name", "");
            show_message("Сообщение!", "Обработчик свойства загружен.", "message_ok", "error", 1500);
        }
    });
}


function delete_filter_prop(o_tr)
{
    o_tr.parent().parent().remove();
    var size_prop_lines = ($('.prop_lines').size())-2;

    if (size_prop_lines == 0)
    {
        $("#prop_list_table").append("<tr id=empty_prop_line><td colspan=10><b>Нет условий для выборки!</b></td></tr>");
    }
}

function add_filter_prop()
{
    var idc = $('#class_list').val();
    var idp = $('#select_props').val();

    if (idc == 0)
    {
        show_message("Ошибка!", "Укажите класс!", "", "error", 8000);
    }
    if (idp == 0)
    {
        show_message("Ошибка!", "Укажите свойство класса!", "", "error", 8000);
    }

    if (idc == 0 || idp == 0) return false;

    var size_prop_lines = ($('.prop_lines').size())-2;

    if (size_prop_lines == 0)
    {
        $('#empty_prop_line').remove();
    }

    var class_name = $('#class_list :selected').text();
    var prop_name = $('#select_props :selected').text();
    var clause_name = $('#select_clause :selected').text();
    var prop_value = $('#prop_name_'+idc+'_'+idp).val();
    var prop_value_text = 'Ждите...';

    ap_showWaitMessage(1);
    jQuery.ajax({
        type: "POST",
        url: "../ajax_points/get_prop_handler_value.php",
        data: "idp="+idp+'&value='+prop_value,
        success: function(result)
        {
            ap_showWaitMessage(0);
            $("#hnd_prop_value_"+size_prop_lines).empty();
            $("#hnd_prop_value_"+size_prop_lines).append(result);
        }
    });



    var inputs = '<input type="hidden" name="filter_props[]" value="'+idp+'" />'+
        '<input type="hidden" name="filter_clause[]" value="'+$('#select_clause :selected').val()+'" />'+
        '<input type="hidden" name="filter_values[]" value="'+prop_value+'" />';

    $("#prop_list_table").append("<tr class=prop_lines><td>"+class_name+" "+inputs+"</td><td>"+prop_name+"</td><td>"+clause_name+"</td><td id='hnd_prop_value_"+size_prop_lines+"'>"+prop_value_text+"</td><td><img src='/images/button_empty.png' onclick='delete_filter_prop($(this))' /></td></tr>");

    show_message("Сообщение!", "Условие фильтрации добавлено.", "message_ok", "error", 1500);
}

function get_props_list()
{
    var idc = $('#class_list').val();

    if (idc == 0)
    {
        $("#select_props").empty();
        $("#select_props").prepend($('<option value="0">Укажите класс!</option>'));
        $("#select_props").attr("disabled", "disabled");
    }
    else
    {
        $("#select_props").empty();
        $("#select_props").prepend($('<option value="0">Ждите!</option>'));

        ap_showWaitMessage(1);
        jQuery.ajax({
            type: "POST",
            url: "../ajax_points/get_props_list.php",
            data: "idc="+idc,
            success: function(result)
            {
                ap_showWaitMessage(0);
                $("#select_props").empty();
                $("#select_props").append(result);
                $("#select_props").removeAttr("disabled");
                show_message("Сообщение!", "Список свойств выбранного класса загружен.", "message_ok", "error", 1500);
            }
        });

    }
}

/////////////////////////////////////////////////////////////////////
// Управление классами
/////////////////////////////////////////////////////////////////////

function add_class_form()
{
    var idc = $('#class :selected').val();

    if (idc == 0)
    {
        show_message("Ошибка!", "Укажите класс!", "", "error", 8000);
        return false;
    }

    ap_showWaitMessage(1);
    jQuery.ajax({
        type: "POST",
        url: "../ajax_points/get_class_form.php",
        data: "idc="+idc,
        success: function(result)
        {
            ap_showWaitMessage(0);
            $("#class :selected").remove();
            show_message("Сообщение!", "Класс добавлен.", "message_ok", "error", 1500);
            $("#class_cont").find("div.empty").remove();
            $("#class_cont").append(result);
        }
    });
}

function drop_multi_class(idc, index)
{
    $('#table_multi_class_'+idc+'_'+index).remove();
    var multi_count = parseInt($('#multi_class_prop_count_'+idc).val());
    $('#multi_class_prop_count_'+idc).val(multi_count-1);
}

function add_multi_class(idc)
{
    ap_showWaitMessage(1);
    var count_multi_class = $('.table_multi_class_'+idc).size();

    //alert(count_multi_class);

    //alert(count_multi_class);

    jQuery.ajax({
        type: "POST",
        url: "../ajax_points/get_class_multi_prop.php",
        data: "idc="+idc+'&index='+count_multi_class,
        success: function(result)
        {
            ap_showWaitMessage(0);
            show_message("Сообщение!", "Свойство мультикласса добалено.", "message_ok", "error", 1500);

            $('.table_multi_class_'+idc+':last').after(result);
            var multi_count = parseInt($('#multi_class_prop_count_'+idc).val());
            $('#multi_class_prop_count_'+idc).val(multi_count+1);
        }
    });
}

function drop_table_class(idc)
{
    var class_name = $('#table_class_name_'+idc).text();
    $('#table_class_'+idc).remove();

    if ($("#class option[value='"+idc+"']").val() == undefined)
    {
        $("#class").append( $('<option value="'+idc+'">'+class_name+'</option>'));
    }

    $("<input/>").attr({type: "hidden", name: "delete_class[]"}).val(idc).appendTo("form");

}

/////////////////////////////////////////////////////////////////////
// Конструктор класса (создание/редактирование)
/////////////////////////////////////////////////////////////////////

var drop_prt_image = new Image();
drop_prt_image.src = "/images/button_empty.png";
//var count_props = 0;

function check_new_prop()
{
//	return true;

    var result = true;

    if ($('#new_pr_name').val().length == 0)
    {
        show_message("Ошибка!", "Введите название свойства", "", "error", 8000);
        result = false;
    }

    if ($('#new_prop_type option:selected').val() == 0)
    {
        show_message("Ошибка!", "Укажите тип данных", "", "error", 8000);
        result = false;
    }

    if (isNaN(parseInt($('#new_prop_sort').val())))
    {
        show_message("Ошибка!", "Порядок должен состоять из чисел", "", "error", 8000);
        result = false;
    }

//	parseInt($(this).val())

    return result;
}

function check_new_option(id_prop)
{
//	return true;

    var result = true;

    if ($('#new_op_name_'+id_prop).val().length == 0)
    {
        show_message("Ошибка!", "Введите название значения набора", "", "error", 8000);
        result = false;
    }

    return result;
}

function get_max_sort(class_name)
{
    var result = 0;
    var value = 0;

    $("."+class_name).each(function (i)
    {
        if (i)
        {
            value = parseInt($(this).val());
            if (value > result) result = value;
        }
    });

    return result+1;
}

function add_option(id)
{
    if (!check_new_option(id)) return false;

    var new_option = $('#new_option_line_'+id).clone(false).insertAfter(".option_lines_"+id+":last");
    var all_option = ($('.option_lines_'+id).size())-2;

    new_option.attr("id", "option_line_"+id+"_"+all_option);

    if (all_option == 1)
    {
        $('#empty_option_line_'+id).empty();
        $('#empty_option_line_'+id).remove();
    }

    var drop_index = all_option;

    button = new_option.find("img");
    button.attr("src", drop_prt_image.src);
    button.click(function () { drop_option(id, drop_index); });

    $('#new_op_name_'+id).val("");
    $('#new_option_sort_'+id).val(get_max_sort("new_op_sort_"+id));
}

function drop_option(id_prop, drop_index)
{
    if ($('.ar_option_id_'+id_prop).length != 0 && $('.ar_option_id_'+id_prop).get(drop_index-1) != undefined)
    {
        $("<input/>").attr({type: "hidden", name: "delete_option_"+id_prop+"[]"}).val($('.ar_option_id_'+id_prop).get(drop_index-1).value).appendTo("form");
    }

    $("#option_line_"+id_prop+"_"+drop_index).empty();
    $("#option_line_"+id_prop+"_"+drop_index).remove();

    var all_option = ($('.option_lines_'+id_prop).size())-2;

    if (!all_option)
    {
        $("#option_list_table_"+id_prop).append("<tr id=empty_option_line_"+id_prop+"><td colspan=10><b>У набора нет значений!</b></td></tr>");
    }

    $('#new_option_sort_'+id_prop).val(get_max_sort("new_op_sort_"+id_prop));
}

function build_select_options(id)
{
    var buffer_option_table_html = '<table border="0" cellpadding=0 id="option_list_table_'+id+'">'+
        '<tr id="new_option_line_'+id+'" class="option_lines_'+id+'">'+
        '<td valign="top"><input class="new_op_name_'+id+'" id="new_op_name_'+id+'" type="text" style="width:170px" name="op_names_'+id+'[]" /></td>'+
        '<td valign="top" align="center"><input class="new_op_sort_'+id+'"  id="new_option_sort_'+id+'" style="width:30px" type="text" name="op_sort_'+id+'[]" /></td>'+
        '<td valign="top"><img id="b_new_option_add_'+id+'" src="/images/icon_new.gif" width="16px" border="0" class="op_act_button_'+id+'" /></td>'+
        '</tr>'+
        '<tr id="option_line_'+id+'_0">'+
        '<td class="clsFormLabelCellDefault">Название</td>'+
        '<td class="clsFormLabelCellDefault">Порядок</td>'+
        '<td>&nbsp;</td>	'+
        '</tr>'+
        '<tr class="option_lines_'+id+'" height="1">'+
        '<td></td>'+
        '<td></td>'+
        '<td></td>'+
        '</tr>'+
        '<tr id=empty_option_line_'+id+'><td colspan=10><b>У набора нет значений!</b></td></tr>'+
        '</table>';

    $("#type_td_"+id).append(buffer_option_table_html);
    $("#b_new_option_add_"+id).click(function () { add_option(id); return false; });
}

function destroy_select_options(drop_index)
{
    $("#option_list_table_"+drop_index).empty();
    $("#option_list_table_"+drop_index).remove();
}

function add_prop()
{
    //if (!check_new_prop()) return false;

    var new_prop = $('#attributes-form').clone(false).appendTo("#table-attributes tbody");

    return false;
    var count_props = ($('.prop_lines').size())-2;

    var new_prop_type_value = $('#new_prop_type option:selected').val();
    new_prop.find("select option[value='"+new_prop_type_value+"']").attr("selected", "selected");

    new_prop.find("input:checkbox").val(count_props);

    new_prop.find("select").removeAttr("id");

    if (count_props == 1)
    {
        $('#empty_prop_line').empty();
        $('#empty_prop_line').remove();
    }

    new_prop.attr("id", "prop_line_"+count_props);
    new_prop.css("background-color", (count_props%2==0)?"#f8fafc":"");

    var type_td = new_prop.find("td").get(1);
    type_td.id = "type_td_"+count_props;

    var drop_index = count_props;

    new_prop.find("select").change(function()
    {
        if ($(this).val() == 4)
            build_select_options(drop_index);
//				else
//					if (confirm("Вы действителдьно желаете сменить тип данных 'набор'?\nЗначения набора будет потеряны!")) destroy_select_options(drop_index);
    });

    button = new_prop.find("img");
    button.attr("src", drop_prt_image.src);
    button.click(function () { drop_prop(drop_index); });

    if (new_prop_type_value == 4)
    {
        build_select_options(count_props);
    }

    $('#new_pr_name').val("");
    $('#new_prop_sort').val(get_max_sort("new_pr_sort"));
    $("#new_prop_type [value='0']").attr("selected", "selected");
}

function drop_prop(index)
{

    if ($('.ar_prop_id').length != 0 && $('.ar_prop_id').get(index-1) != undefined)
    {
        $("<input/>").attr({type: "hidden", name: "delete_prop[]"}).val($('.ar_prop_id').get(index-1).value).appendTo("form");
    }

    $('#prop_line_'+index).empty();
    $('#prop_line_'+index).remove();

    var count_props = ($('.prop_lines').size())-2;

    if (!count_props)
    {
        $("#prop_list_table").append("<tr id=empty_prop_line><td colspan=10><b>У класса нет свойств!</b></td></tr>");
    }

    $('#new_prop_sort').val(get_max_sort("new_pr_sort"));


}