<script src="resources/js/jquery/plugin/jquery.tablesuite.js"></script>

<table class="table {*table-hover*}" id="table-attributes">
	<colgroup>
		<col width="*" />
		<col width="350px" />
		<col width="50px" />
		<col width="20px" />
	</colgroup>
	<thead>
	<tr>
		<th>Название атрибута</th>
		<th>Тип данных</th>
		<th>Порядок</th>
		<th>&nbsp;</th>
	</tr>
	<tr id="attributes-form">
		<td><input type="text" class="form-control"></td>
		<td>
			<select class="form-control selectpicker" name="attributes[]" id="attributes">
				<option selected="selected" value="0"></option>
				<option value="1">Текст</option>
				<option value="2">Число</option>
				<option value="3">Текстовая область</option>
				<option value="9">Переключатель</option>
				<option value="4">Набор</option>
				<option value="5">Дата</option>
				<option value="6">Дата и время</option>
				<option value="7">Сотрудники</option>
				<option value="8">Категории</option>
				<option value="10">Контакт</option>
				<option value="11">Файл</option>
			</select>
		</td>
		<td><input type="text" class="form-control"></td>
		<td><button class="btn btn-add btn-default"><i class="fa fa-plus"></i></button></td>
	</tr>
	</thead>
	<tbody>

	</tbody>
</table>

<script>
	$(function(){

		$("#table-attributes").jtablesuite({
			callback_add: function(current) {
				//console.log(current);

				var attribute_type = current.find("select.form-control");


				// Добавляем элементы набора для типа 'Набор'
				if (attribute_type.val() == 4) {
					var suite_table = '';

					suite_table+='<table class="table table-attributes-suite">';
					suite_table+='<colgroup>';
					suite_table+='<col width="*"/>';
					suite_table+='<col width="50px"/>';
					suite_table+='<col width="20px"/>';
					suite_table+='</colgroup>';
					suite_table+='<thead>';
					suite_table+='<tr>';
					suite_table+='<th>Название</th><th>Порядок</th><th>&nbsp;</th>';
					suite_table+='</tr>';
					suite_table+='<tr>';
					suite_table+='<td><input type="text" class="form-control"></td><td><input type="text" class="form-control"></td><td><button class="btn btn-add btn-default"><i class="fa fa-plus"></button></td>';
					suite_table+='</tr>';
					suite_table+='</thead>';
					suite_table+='<tbody>';

					suite_table+='</tbody>';
					suite_table+='</table>';

					attribute_type.closest('td').append(suite_table).find('.table-attributes-suite').jtablesuite();

					//console.log(attribute_type.closest('td').find('.table-attributes-suite'));
				}


				toastr.success('Не забудте сохранить изменения!', 'Атрибут добавлен');
			},

			callback_delete: function() {
				toastr.success('Не забудте сохранить изменения!', 'Атрибут удален');
			}
		});

		/*

		var table_attributes = $("#table-attributes");

		table_attributes.find('thead button').on("click", function () {
			var attributes_form = $(this).closest("tr");

			// Клонируем форму атрибута
			var cur_attributes_form = attributes_form.clone().removeProp("id").appendTo(table_attributes.find("tbody"));

			// Копируем значение "Типа данных"
			var attribute_type = cur_attributes_form.find("select.form-control").val(attributes_form.find("select.form-control").val());

			// Меняем кнопку на удаление и вешаем обработчк
			cur_attributes_form.find("button.btn-add").on("click", function() {
				$(this).closest('tr').remove();
				toastr.success('Не забудте сохранить изменения!', 'Атрибут удален');
			}).toggleClass("btn-add btn-delete btn-default btn-danger").find("i.fa").toggleClass("fa-plus fa-times");

			// Добавляем элементы набора для типа 'Набор'
			if (attribute_type.val() == 4) {
				var suite_table = '';

				suite_table+='<table class="table table-attributes-suite">';
					suite_table+='<colgroup>';
						suite_table+='<col width="*"/>';
						suite_table+='<col width="50px"/>';
						suite_table+='<col width="20px"/>';
					suite_table+='</colgroup>';
					suite_table+='<thead>';
						suite_table+='<tr>';
							suite_table+='<th>Название</th><th>Порядок</th><th>&nbsp;</th>';
						suite_table+='</tr>';
						suite_table+='<tr>';
							suite_table+='<td><input type="text" class="form-control"></td><td><input type="text" class="form-control"></td><td><button class="btn btn-default"><i class="fa fa-plus"></button></td>';
						suite_table+='</tr>';
					suite_table+='</thead>';
					suite_table+='<tbody>';

					suite_table+='</tbody>';
				suite_table+='</table>';

				attribute_type.closest('td').append(suite_table);
			}

			// Очищаем форму
			attributes_form.find("input.form-control").val('');
			attributes_form.find("select.form-control").prop('selectedIndex', 0).selectpicker('refresh');

			toastr.success('Не забудте сохранить изменения!', 'Атрибут добавлен');

			return false;
		});
		*/
	});
</script>



{*

<div id="head_title">
<h1>{if $idc==0}Создание нового класса свойств{else}Класс свойств: &laquo;{$name}&raquo; {/if}</h1>
<img src="images/icon_list.png" align="texttop"> <a href="index.php?act=classlist">Список классов</a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/icon_add.png" align="texttop"> <a href="index.php?act=classedit" class="select">Создать класс</a>
</div>
<script type="text/javascript" src="jscript/classes_property.js"></script>

<a name="form"></a>
<form method="post" name="post" id="form">
<table width="100%" border="0" class="clsFormTable">
<tr>
<td class="clsFormLabelCell{if $error_boxs.message}Error{else}Default{/if}" width="150">Название</td>
<td class="clsFormFieldCellDefault">
<input text="text" name="name" style="width:400px" value="{$name}" class="title" />
</td>
</tr>
<tr>
<td class="clsFormLabelCell{if $error_boxs.message}Error{else}Default{/if}" width="150">Наборный класс</td>
<td class="clsFormFieldCellDefault">
<input value="1" {if $multi}checked{/if} id="multi" name="multi" type="checkbox" >
</td>
</tr>
<tr>
<td class="clsFormLabelCell{if $error_boxs.message}Error{else}Default{/if}" width="150">Свойства класса</td>
<td class="clsFormFieldCellDefault">

<table border="0" id="prop_list_table" class="clsFormTable table_list">
<tr id="new_prop_line" class="prop_lines">
<td valign="top"><input class="new_pr_name" id="new_pr_name" type="text" style="width:250px" name="pr_names[]" id="pr_names" /></td>
<td valign="top"><select class="new_pr_type" id="new_prop_type" name="pr_types[]" id="pr_types" style="width:250px">
<option value="0">::Укажите::</option>
<option value="1">Текст</option>
<option value="2">Число</option>
<option value="3">Текстовая область</option>
<option value="9">Переключатель</option>
<option value="4">Набор</option>
<option value="5">Дата</option>
<option value="6">Дата и время</option>
<option value="7">Сотрудники</option>
<option value="8">Категории</option>
<option value="10">Контакт</option>
<option value="11">Файл</option>
</select></td>
<td valign="top" align="center"><input class="new_pr_sort"  id="new_prop_sort" style="width:30px" type="text" name="pr_sort[]" id="pr_sort" /></td>
<td valign="top"><img id="b_new_prop_add" src="images/icon_new.gif" border="0" class="prt_act_button" /></td>
</tr>
<thead>
<tr id="prop_line_0">
<th class="clsFormLabelCellDefault">Название</th>
<th class="clsFormLabelCellDefault">Тип</th>
<th class="clsFormLabelCellDefault">Порядок</th>
<th>&nbsp;</th>
</tr>
</thead>
<tr class="prop_lines" height="1">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
{assign var="index" value="1"}
{foreach key=cid name=list item=item from=$props}
<input type="hidden" name="ar_prop_id[]" id="ar_prop_id" class="ar_prop_id" value="{$item.id}" />
		<tr id="prop_line_{$index}" class="prop_lines" bgcolor="{cycle values=",#f8fafc"}">
			<td valign="top">
				<input class="new_pr_name" id="new_pr_name" style="width: 250px;" name="pr_names[]" id="pr_names" type="text" value="{$item.name}">
			</td>
			<td id="type_td_{$index}" valign="top">
				<select class="new_pr_type" name="pr_types[]" id="pr_types" style="width: 250px;" onchange="if (this.value==4) build_select_options({$index});">
					<option value="0">::Укажите::</option>
					<option value="1" {if $item.type==1}selected{/if}>Текст</option>
<option value="2" {if $item.type==2}selected{/if}>Число</option>
<option value="3" {if $item.type==3}selected{/if}>Текстовая область</option>
<option value="9" {if $item.type==9}selected{/if}>Переключатель</option>
<option value="4" {if $item.type==4}selected{/if}>Набор</option>
<option value="5" {if $item.type==5}selected{/if}>Дата</option>
<option value="6" {if $item.type==6}selected{/if}>Дата и время</option>
<option value="7" {if $item.type==7}selected{/if}>Сотрудники</option>
<option value="8" {if $item.type==8}selected{/if}>Категории</option>
<option value="10" {if $item.type==10}selected{/if}>Контакт</option>
<option value="11" {if $item.type==11}selected{/if}>Файл</option>
</select>
	{if $item.options}
	<table id="option_list_table_{$index}" border="0" cellpadding="0">
	<tbody>
	<tr id="new_option_line_{$index}" class="option_lines_{$index}"><td valign="top"><input class="new_op_name_{$index}" id="new_op_name_{$index}" style="width: 170px;" name="op_names_{$index}[]" type="text"></td><td valign="top" align="center"><input class="new_op_sort_{$index}" id="new_option_sort_{$index}" style="width: 30px;" name="op_sort_{$index}[]" type="text"></td><td valign="top"><img id="b_new_option_add_{$index}" src="images/icon_new.gif" class="op_act_button_{$index}" width="16px" border="0"></td></tr>
	<tr id="option_line_{$index}_0"><td class="clsFormLabelCellDefault">Название</td><td class="clsFormLabelCellDefault">Порядок</td><td>&nbsp;</td></tr>
	<tr class="option_lines_{$index}" height="1"><td></td><td></td><td></td></tr>
		{assign var="op_index" value="0"}
		{foreach key=cid name=op_list item=op_item from=$item.options}
		<input type="hidden" name="ar_option_id_{$index}[]" class="ar_option_id_{$index}" value="{$op_item.id}" />
						<tr id="option_line_{$index}_{$op_index+1}" class="option_lines_{$index}"><td valign="top"><input class="new_op_name_{$index}" id="new_op_name_{$index}" style="width: 170px;" value="{$op_item.name}" name="op_names_{$index}[]" type="text"></td><td valign="top" align="center"><input class="new_op_sort_{$index}" id="new_option_sort_{$index}" style="width: 30px;" value="{$op_item.sort}" name="op_sort_{$index}[]" type="text"></td><td valign="top"><img id="b_new_option_add_{$index}_{$op_index}" src="images/button_empty.png" class="op_act_button_{$index}_{$op_index}" onclick="drop_option({$index}, {$op_index+1}); return false;" width="16px" oncl border="0"></td></tr>
						{assign var="op_index" value=$op_index+1}
						{/foreach}
					{if !$op_index}
					<tr id="empty_option_line_{$index}"><td colspan="10"><b>У набора нет значений!</b></td></tr>
					{/if}
				</tbody>
				</table>
				{literal}<script type="text/javascript">$(document).ready(function(){ $('#new_option_sort_{/literal}{$index}{literal}').val(get_max_sort("new_op_sort_{/literal}{$index}{literal}")); $("#b_new_option_add_{/literal}{$index}{literal}").click(function () { add_option({/literal}{$index}{literal}); return false; });});</script>{/literal}

				{/if}
			</td>
			<td valign="top" align="center"><input class="new_pr_sort" id="new_prop_sort" style="width: 30px;" name="pr_sort[]" id="pr_sort" value="{$item.sort}" type="text"></td>
			<td valign="top"><img id="b_new_prop_add" src="images/button_empty.png" class="prt_act_button" onclick="drop_prop({$index}); return false;" border="0"></td>
		</tr>
		{assign var="index" value=$index+1}
		{/foreach}
		{if !$index}
		<tr id=empty_prop_line><td colspan=10><b>У класса нет свойств!</b></td></tr>
		{/if}
		</table>

	</td>
</tr>

<tr>
	<td colspan="2">
	<br/>
	&nbsp;Далее:
	<select name="act_post">
		<option value="0" {if $act_post == 0}selected{/if}>В список</option>
		<option value="1" {if $act_post == 1}selected{/if}>Новый класс</option>
	</select>

	{if $idc==0}
		<div style="float:left"><input type="submit" class="submit btn-primary" value="Добавить класс" name="save_class" /></div>
	{else}
	<div style="float:left"><input type="submit" class="submit btn-primary" value="Сохранить" name="save_class" /></div>
	<div style="float:right">&nbsp;<input type="submit" class="btn-danger" value="Удалить класс" name="cut_class" onclick="return confirm_delete('Вы действительно хотите удалить этот класс?');"  /></div>
	{/if}
	</td>
</tr>

</table>
</form>


{literal}
	<script>
		$(document).ready(function(){
			$("#b_new_prop_add").click(function () { add_prop(); return false; });
			$('#new_prop_sort').val(get_max_sort("new_pr_sort"));
		});
{/literal}
</script>
*}