<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:38:26
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\types\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:910959c4f632464b04-19806410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd24ac7a19968f8c5f8f09cc4bb6d2ff57a820aff' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\list.tpl',
      1 => 1451394888,
      2 => 'file',
    ),
    '934dc6106a7154af41384b5751b14b9d4b649175' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\abstracts\\list.tpl',
      1 => 1450953104,
      2 => 'file',
    ),
    '563bcfcca0a362638263a31fafa1d3e33037119d' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\lists\\actions.tpl',
      1 => 1457392314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '910959c4f632464b04-19806410',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_id' => 0,
    'controller_info' => 0,
    'module_name' => 0,
    'ar_data' => 0,
    'prev_group_value' => 0,
    'item' => 0,
    'item_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f63257ba12_73402402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f63257ba12_73402402')) {function content_59c4f63257ba12_73402402($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.replace.php';
?>

<?php if (!$_smarty_tpl->tpl_vars['module_id']->value&&$_smarty_tpl->tpl_vars['controller_info']->value['module_id']) {?>
    <?php $_smarty_tpl->tpl_vars["module_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module_id'], null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["module_name"] = new Smarty_variable(smarty_modifier_replace(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'],"/","-"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["module_path"] = new Smarty_variable(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["ar_data"] = new Smarty_variable($_smarty_tpl->tpl_vars['ar_'.(smarty_modifier_replace($_smarty_tpl->tpl_vars['module_name']->value,"-","_"))]->value, null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['ar_data']->value['data']) {?>
    <table id="<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom ">
        
    <colgroup>
        <col width="50px" />
        <col width="*" />
        <col width="50px" />
        <col width="50px" />
    </colgroup>


        
    <thead>
    <tr>
        <th></th>
        <th><?php echo L::forms_labels_name;?>
</th>
        <th class="text-center"><i class="fa fa-tasks"></i></th>
        <th class="text-right">&nbsp;</th>
    </tr>
    </thead>


        <tbody>
        
            <?php if (isset($_smarty_tpl->tpl_vars['ar_data']->value['limit'])) {?>
            <tr class="warning">
                <td colspan="20" class="text-center">
                    Страница <?php echo intval($_smarty_tpl->tpl_vars['ar_data']->value['offset']/$_smarty_tpl->tpl_vars['ar_data']->value['limit'])+1;?>
 из <?php echo ceil($_smarty_tpl->tpl_vars['ar_data']->value['total']/$_smarty_tpl->tpl_vars['ar_data']->value['limit']);?>

                </td>
            </tr>
            <?php }?>
        

        <?php $_smarty_tpl->tpl_vars["prev_group_value"] = new Smarty_variable("-1", null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['item_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_data']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item_id']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>

            
            <?php if ($_smarty_tpl->tpl_vars['ar_data']->value['group']['by']&&$_smarty_tpl->tpl_vars['ar_data']->value['group']['by']!="none"&&$_smarty_tpl->tpl_vars['prev_group_value']->value!=$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['ar_data']->value['group']['by']]) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("./list_group_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('column'=>$_smarty_tpl->tpl_vars['ar_data']->value['group']['by'],'value'=>$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['ar_data']->value['group']['by']],'data'=>$_smarty_tpl->tpl_vars['item']->value), 0);?>

                <?php $_smarty_tpl->tpl_vars["prev_group_value"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['ar_data']->value['group']['by']], null, 0);?>
            <?php }?>

            
    <tr data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
        <td>
            <div style="height:24px; width:24px;" class="label-<?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
">&nbsp;</div>
        </td>
        <td>
            <span class="title"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
        </td>
        <td class="text-center valign-middle">
            <a href="demands/?cnd[type_id]=<?php echo $_smarty_tpl->tpl_vars['item_id']->value;?>
" class="badge badge-white">
                <?php echo $_smarty_tpl->tpl_vars['item']->value['demands_count'];?>

            </a>
        </td>
        <td class="text-right">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==@constant('DEFAULT_DEMAND_TYPE_ID')) {?>
                <?php /*  Call merged included template "helpers/lists/actions.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/lists/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('module_id'=>$_smarty_tpl->tpl_vars['module_id']->value,'id'=>$_smarty_tpl->tpl_vars['item_id']->value,'denied_delete'=>true), 0, '910959c4f632464b04-19806410');
content_59c4f632505986_54629041($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/lists/actions.tpl" */?>
            <?php } else { ?>
                <?php /*  Call merged included template "helpers/lists/actions.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/lists/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('module_id'=>$_smarty_tpl->tpl_vars['module_id']->value,'id'=>$_smarty_tpl->tpl_vars['item_id']->value), 0, '910959c4f632464b04-19806410');
content_59c4f632505986_54629041($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/lists/actions.tpl" */?>
            <?php }?>
        </td>
    </tr>


        <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div class="alert alert-default">
        <?php if ($_smarty_tpl->tpl_vars['module_id']->value) {?>
            <?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['name'];?>
 не найдены
        <?php } else { ?>
            <?php echo L::text_nothing_found;?>

        <?php }?>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['module_id']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("helpers/lists/more.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_data'=>$_smarty_tpl->tpl_vars['ar_data']->value,'module_id'=>$_smarty_tpl->tpl_vars['module_id']->value), 0);?>

<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:38:26
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\lists\actions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_59c4f632505986_54629041')) {function content_59c4f632505986_54629041($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.replace.php';
if (!is_callable('smarty_modifier_access')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.access.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?>
<?php if (!$_smarty_tpl->tpl_vars['module_id']->value) {?>
    <?php $_smarty_tpl->tpl_vars["module_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module_id'], null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["module_alias"] = new Smarty_variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'],"/","-"), null, 0);?>

<?php if ((smarty_modifier_access($_smarty_tpl->tpl_vars['module_id']->value,m_roles::CRUD_U)&&!$_smarty_tpl->tpl_vars['denied_update']->value)||(smarty_modifier_access($_smarty_tpl->tpl_vars['module_id']->value,m_roles::CRUD_D)&&!$_smarty_tpl->tpl_vars['denied_delete']->value)) {?>
    <!-- Split button -->
    <div class="btn-group btn-group-sm btn-group-actions">

        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Меню с переключением</span>
        </button>

        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-wauto" role="menu">
            <?php if (smarty_modifier_access($_smarty_tpl->tpl_vars['module_id']->value,m_roles::CRUD_U)&&!$_smarty_tpl->tpl_vars['denied_update']->value) {?>
                <li><a href="<?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'];?>
/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/"><i class="fa fa-pencil fa-fw"></i> <?php echo L::actions_edit;?>
</a></li>
            <?php }?>

            <?php if (smarty_modifier_access($_smarty_tpl->tpl_vars['module_id']->value,m_roles::CRUD_D)&&!$_smarty_tpl->tpl_vars['denied_delete']->value) {?>
                <li><a href="<?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'];?>
/delete/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/" class="text-danger delete-record"><i class="fa fa-trash-o fa-fw"></i> <?php echo L::actions_delete;?>
</a></li>
            <?php }?>
        </ul>
    </div>

    <?php if (!$_smarty_tpl->tpl_vars['delete_func']->value&&smarty_modifier_access($_smarty_tpl->tpl_vars['module_id']->value,m_roles::CRUD_D)&&!$_smarty_tpl->tpl_vars['denied_delete']->value) {?>
        <?php echo '<script'; ?>
>
            function deleted_list_record(target, response) {

                $(target).closest(".btn-group.open .dropdown-menu").dropdown('toggle');
                $(target).closest("<?php if ($_smarty_tpl->tpl_vars['tree']->value) {?>li.dd-item<?php } else { ?>tr<?php }?>").fadeOut('slow', function() {
                    if ($(this).hasClass("selected")) {
                        $(this).closest("<?php if ($_smarty_tpl->tpl_vars['tree']->value) {?>.dd<?php } else { ?>table<?php }?>.jcatcher").jcatcher.unselect($(this).data("id"));
                    }

                    <?php if ($_smarty_tpl->tpl_vars['tree']->value) {?>
                        if ($(this).closest("ol.dd-list").children("li").length == 1) {
                            $(this).closest("ol.dd-list").parent().find("button[data-action=collapse]").hide();
                            $(this).closest("ol.dd-list").remove();
                        }
                    <?php }?>

                    $(this).remove();

                });

                toastr.success('<?php if ($_smarty_tpl->tpl_vars['module_id']->value) {
echo smarty_modifier_mb_ucfirst(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['morph'][0]);
} else {
echo smarty_modifier_mb_ucfirst(L::text_object_morph_one);
}?> успешно удалена', 'Удалено');
            }

            $(document).on("click", "#<?php echo $_smarty_tpl->tpl_vars['module_alias']->value;?>
-<?php if ($_smarty_tpl->tpl_vars['tree']->value) {?>nes<?php }?>table .btn-group-actions .delete-record", function() {
           // $("#<?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'];?>
-table").find(".btn-group-actions .delete-record").on("click", function() {
                CoreIW.ajaxcall($(this), "<?php echo L::confirm_delete_message;?>
", "<?php echo L::crud_delete;?>
 <?php if ($_smarty_tpl->tpl_vars['module_id']->value) {
echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['morph'][1];
} else {
echo L::text_object_morph_two;
}?>", function($e) { deleted_list_record($e); });
                return false;
            });

        <?php echo '</script'; ?>
>

        <?php $_smarty_tpl->tpl_vars["delete_func"] = new Smarty_variable(true, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars["delete_func"] = clone $_smarty_tpl->tpl_vars["delete_func"];?>
    <?php }?>
<?php }?>

<?php }} ?>
