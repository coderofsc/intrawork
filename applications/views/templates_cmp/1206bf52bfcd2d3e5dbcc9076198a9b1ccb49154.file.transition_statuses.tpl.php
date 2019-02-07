<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:48:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\types\form\transition_statuses.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14395c5a2ecb547eb0-00317204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1206bf52bfcd2d3e5dbcc9076198a9b1ccb49154' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\form\\transition_statuses.tpl',
      1 => 1451312958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14395c5a2ecb547eb0-00317204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ts' => 0,
    'm_status_id' => 0,
    'master' => 0,
    's_status_id' => 0,
    'status_id' => 0,
    'status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2ecb60f265_02314044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2ecb60f265_02314044')) {function content_5c5a2ecb60f265_02314044($_smarty_tpl) {?>
    <style>
        table#transition-statuses {
            border-spacing: 0;
            border-collapse: collapse;
            overflow: hidden;
            z-index: 1;
        }

        table#transition-statuses td, table#transition-statuses th {
            padding: 10px;
            position: relative;
        }

        table#transition-statuses th[data-id] {
            /*width:100px;*/
           min-width:100px;
        }

        table#transition-statuses td:hover::before {
            background-color: #f9f9f9;
            content: '\00a0';
            height: 100%;
            left: -5000px;
            position: absolute;
            top: 0;
            width: 10000px;
            z-index: -1;
        }

        table#transition-statuses td:hover::after {
            background-color: #f9f9f9;
            content: '\00a0';
            height: 10000px;
            left: 0;
            position: absolute;
            top: -5000px;
            width: 100%;
            z-index: -1;
        }

        table#transition-statuses tr.ondrag td,
        table#transition-statuses tr.ondrag th {
            background-color: #ffa;
        }

        table#transition-statuses tr.ondrag .draghandle {
            color: #333;
        }

        table#transition-statuses .draghandle {
            cursor: move;
        }



    </style>



<div style="overflow-x: auto">
<table class="table"  id="transition-statuses">
    <colgroup>
        <col width="100"/>
        <col width="20"/>
        <col width="100"/>
        <col width="*"/>
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th></th>
        <th>Активен</th>
        <?php  $_smarty_tpl->tpl_vars['m_status_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m_status_id']->_loop = false;
 $_from = array_keys($_smarty_tpl->tpl_vars['ts']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m_status_id']->key => $_smarty_tpl->tpl_vars['m_status_id']->value) {
$_smarty_tpl->tpl_vars['m_status_id']->_loop = true;
?>
            <th data-id="<?php echo $_smarty_tpl->tpl_vars['m_status_id']->value;?>
" class="text-center"><?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['m_status_id']->value]['name'];?>
</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['master'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['master']->_loop = false;
 $_smarty_tpl->tpl_vars['m_status_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['master']->key => $_smarty_tpl->tpl_vars['master']->value) {
$_smarty_tpl->tpl_vars['master']->_loop = true;
 $_smarty_tpl->tpl_vars['m_status_id']->value = $_smarty_tpl->tpl_vars['master']->key;
?>
        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['m_status_id']->value;?>
">
            <th nowrap="" class="valign-middle">
                <i class="fa fa-arrows-v text-muted draghandle"></i>&nbsp;
                <?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['m_status_id']->value]['name'];?>

            </th>
            <th class="valign-middle">
                <?php if ($_smarty_tpl->tpl_vars['m_status_id']->value!=m_demands::STATUS_NEW) {?>
                    <a href="#" class="delete-status"><i class="fa fa-trash"></i></a>
                <?php }?>
            </th>
            <th>
                <select class="selectpicker" data-width="150px" name="dt_data[ts][<?php echo $_smarty_tpl->tpl_vars['m_status_id']->value;?>
][active_role]">
                    <option value="0"></option>
                    <option <?php if ($_smarty_tpl->tpl_vars['master']->value['active_role']==@constant('USER_ROLE_CUSTOMER')) {?>selected=""<?php }?> value="<?php echo @constant('USER_ROLE_CUSTOMER');?>
"><?php echo L::members_customer;?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['master']->value['active_role']==@constant('USER_ROLE_EXECUTOR')) {?>selected=""<?php }?> value="<?php echo @constant('USER_ROLE_EXECUTOR');?>
"><?php echo L::members_executor;?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['master']->value['active_role']==@constant('USER_ROLE_RESPONSIBLE')) {?>selected=""<?php }?> value="<?php echo @constant('USER_ROLE_RESPONSIBLE');?>
"><?php echo L::members_responsible;?>
</option>
                </select>
            </th>
            <?php  $_smarty_tpl->tpl_vars['s_status_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s_status_id']->_loop = false;
 $_from = array_keys($_smarty_tpl->tpl_vars['ts']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s_status_id']->key => $_smarty_tpl->tpl_vars['s_status_id']->value) {
$_smarty_tpl->tpl_vars['s_status_id']->_loop = true;
?>
                <td data-id="<?php echo $_smarty_tpl->tpl_vars['s_status_id']->value;?>
" class="text-center">
                    <?php if ($_smarty_tpl->tpl_vars['m_status_id']->value==$_smarty_tpl->tpl_vars['s_status_id']->value) {?>
                        <input name="dt_data[ts][<?php echo $_smarty_tpl->tpl_vars['m_status_id']->value;?>
][slaves][]" value="<?php echo $_smarty_tpl->tpl_vars['s_status_id']->value;?>
" type="hidden">
                    <?php }?>
                    <div class="checkbox">
                    <input class="i-checks" <?php if ($_smarty_tpl->tpl_vars['m_status_id']->value==$_smarty_tpl->tpl_vars['s_status_id']->value) {?>disabled="" checked=""<?php } elseif (in_array($_smarty_tpl->tpl_vars['s_status_id']->value,$_smarty_tpl->tpl_vars['master']->value['slaves'])) {?>checked=""<?php }?> <?php if ($_smarty_tpl->tpl_vars['m_status_id']->value!=$_smarty_tpl->tpl_vars['s_status_id']->value) {?>name="dt_data[ts][<?php echo $_smarty_tpl->tpl_vars['m_status_id']->value;?>
][slaves][]"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['s_status_id']->value;?>
" type="checkbox" />
                    </div>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>


<div class="space space-sm"></div>
<select  class="selectpicker" id="unused_statuses">
    <option value="0"></option>
    <?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_smarty_tpl->tpl_vars['status_id'] = new Smarty_Variable;
 $_from = m_demands::$ar_status; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
 $_smarty_tpl->tpl_vars['status_id']->value = $_smarty_tpl->tpl_vars['status']->key;
?>
        <option <?php if ($_smarty_tpl->tpl_vars['ts']->value[$_smarty_tpl->tpl_vars['status_id']->value]) {?>disabled=""<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['status_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value['name'];?>
</option>
    <?php } ?>
</select>
<button class="btn btn-success" id="btn-add-statuses">Добавить статусы</button>

<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/tablednd/jquery.tablednd.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

    $(document).ready(function () {

        var $ts_table = $("#transition-statuses");

        function add_status(id, name) {

            var buffer_row = '';
            buffer_row+= '<tr data-id="'+id+'">'+
                '<th class="valign-middle" nowrap=""><i class="fa fa-arrows-v text-muted draghandle"></i>&nbsp;'+name+'</th>'+
                '<th class="valign-middle"><a href="#" class="delete-status"><i class="fa fa-trash"></i></a></th>'+
                '<th>'+
                    '<select class="selectpicker" data-width="150px" name="dt_data[ts]['+id+'][active_role]">'+
                        '<option value="0"></option>'+
                        '<option value="<?php echo @constant('USER_ROLE_CUSTOMER');?>
"><?php echo L::members_customer;?>
</option>'+
                        '<option value="<?php echo @constant('USER_ROLE_EXECUTOR');?>
"><?php echo L::members_executor;?>
</option>'+
                        '<option value="<?php echo @constant('USER_ROLE_RESPONSIBLE');?>
"><?php echo L::members_responsible;?>
</option>'+
                    '</select>'+
                '</th>';

            $ts_table.find("tr[data-id]").each(function() {
                var m_status_id = $(this).data("id");
                var buffer_td ='<td data-id="'+id+'" class="text-center"><div class="checkbox"><input class="i-checks" name="dt_data[ts]['+m_status_id+'][slaves][]" value="'+id+'" type="checkbox"></div></td>';
                $(this).append(buffer_td);
                buffer_td ='<td data-id="'+m_status_id+'" class="text-center"><div class="checkbox"><input class="i-checks" name="dt_data[ts]['+id+'][slaves][]" value="'+m_status_id+'" type="checkbox"></div></td>';
                buffer_row+=buffer_td;
            });

            buffer_row+='<td data-id="'+id+'" class="text-center"><div class="checkbox"><input name="dt_data[ts]['+id+'][slaves][]" value="'+id+'" type="hidden"><input class="i-checks" checked="" disabled="" value="1" type="checkbox"></div></td>';
            $ts_table.append(buffer_row);
            $ts_table.find("thead tr").append('<th class="text-center" data-id="'+id+'">'+name+'</th>');

            CoreIW.init_icheck($ts_table.find('td[data-id="'+id+'"]'));
            $ts_table.find("tr[data-id]").each(function() {
                var m_status_id = $(this).data("id");
                CoreIW.init_icheck($ts_table.find('td[data-id="'+m_status_id+'"]'));
            });
            CoreIW.init_selectpicker($ts_table.find('tr[data-id="'+id+'"]'));
        }

        var $unused_statuses = $("select#unused_statuses");

        $("#btn-add-statuses").on("click", function() {
            $unused_statuses.find("option:selected").each(function() {
                var status_id = $(this).val();
                var status_name = $(this).text();
                if (status_id == 0) {
                    return false;
                }

                add_status(status_id, status_name);
                $(this).attr("disabled", "disabled");

            });
            $unused_statuses.selectpicker('val', 0).selectpicker("refresh");

            table_dnd();

            return false;
        });


        $ts_table.delegate(".delete-status", "click", function() {
            var $row = $(this).closest("tr");
            var status_id = $row.data("id");
            $row.remove();
            $("th[data-id="+status_id+"], td[data-id="+status_id+"]").remove();

            $unused_statuses.find("option[value="+status_id+"]").removeAttr("disabled");
            $unused_statuses.selectpicker("refresh");

            return false;
        });

        var drag_start_index = 0;

        function table_dnd() {
            $ts_table.tableDnD(
                    {
                        dragHandle: ".draghandle",
                        onDragClass: "ondrag",
                        onDragStop: function (table, row) {
                            var status_id = $(row).data("id");
                            var drag_end_index = $(row).index();

                            $("th[data-id='" + status_id +"'],td[data-id='" + status_id +"']").each(function () {
                                var $el = $(this).parent().children().eq(drag_end_index+3);

                                if (drag_start_index > drag_end_index) {
                                    $(this).insertBefore($el);
                                } else {
                                    $(this).insertAfter($el);
                                }
                            });
                        },
                        onDragStart: function (table, drag) {
                            drag_start_index = $(drag).closest("tr").index();
                        }
                    }
            );
        }

        table_dnd();

    });

<?php echo '</script'; ?>
><?php }} ?>
