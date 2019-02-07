<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:54:33
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\users\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137905c5a30498a6a99-00572221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e362064b32995de318795ea3fdb2201b6d925c59' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\list.tpl',
      1 => 1450451858,
      2 => 'file',
    ),
    'af789378631226c2e7a190ea77b0ef9babb704be' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\abstracts\\list.tpl',
      1 => 1450953104,
      2 => 'file',
    ),
    '252e9ccb60fe8d0987082bb023ace3824c878f38' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\storage_url.tpl',
      1 => 1454590132,
      2 => 'file',
    ),
    '53da491cbe03289d8c7288c5b906ee51f9ff6966' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\avatar.tpl',
      1 => 1452225012,
      2 => 'file',
    ),
    'd2eb1185389ac13543d8158c887e61287c2a9608' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\lists\\actions.tpl',
      1 => 1457392314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137905c5a30498a6a99-00572221',
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
  'unifunc' => 'content_5c5a3049ba4541_80655152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3049ba4541_80655152')) {function content_5c5a3049ba4541_80655152($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.replace.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
if (!is_callable('smarty_modifier_pass_time')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.pass_time.php';
?>

<?php if (!$_smarty_tpl->tpl_vars['module_id']->value&&$_smarty_tpl->tpl_vars['controller_info']->value['module_id']) {?>
    <?php $_smarty_tpl->tpl_vars["module_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module_id'], null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["module_name"] = new Smarty_variable(smarty_modifier_replace(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'],"/","-"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["module_path"] = new Smarty_variable(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["ar_data"] = new Smarty_variable($_smarty_tpl->tpl_vars['ar_'.(smarty_modifier_replace($_smarty_tpl->tpl_vars['module_name']->value,"-","_"))]->value, null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['ar_data']->value['data']) {?>
    <table id="<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom table-sticky-head footable">
        
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="50px"/>
        <col width="130px"/>
        <col width="130px"/>
        <col width="100px"/>
        <col width="130px"/>
        <col width="50px"/>
    </colgroup>


        
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th data-toggle="true"></th>
        <th>&nbsp;</th>
        <th><?php echo L::forms_labels_face_name;?>
</th>
        <th class="text-center"><?php echo L::forms_labels_users_work;?>
</th>
        <th data-hide="phone,tablet"><?php echo smarty_modifier_mb_ucfirst(L::modules_departments_morph_one);?>
</th>
        <th data-hide="phone"><?php echo L::forms_labels_email;?>
</th>
        <th data-hide="phone,tablet"><?php echo L::forms_labels_phone;?>
</th>
        <th data-hide="all"><?php echo L::forms_labels_users_activity_date;?>
</th>
        <th>&nbsp;</th>
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
            <?php /*  Call merged included template "helpers/avatar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['item']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS')), 0, '137905c5a30498a6a99-00572221');
content_5c5a30499b4352_63182572($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/avatar.tpl" */?>
        </td>
        <td></td>
        <td>
            <i class="fa fa-toggle-<?php if ($_smarty_tpl->tpl_vars['item']->value['inside']) {?>on text-success<?php } else { ?>off text-muted<?php }?>"></i>
        </td>
        <td>
            <a class="title" href="users/view/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                <?php echo $_smarty_tpl->tpl_vars['item']->value['fio'];?>

            </a>
            <div class="small text-muted"><?php if ($_smarty_tpl->tpl_vars['item']->value['post_id']) {
echo $_smarty_tpl->tpl_vars['item']->value['post_name'];
}?></div>
            <div class="clearfix"></div>
        </td>
        <td class="text-center">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['demands_work']) {?>
                <a href="demands/?cnd[status][0]=<?php echo m_demands::STATUS_WORK;?>
&cnd[eu_eid]=<?php echo $_smarty_tpl->tpl_vars['item']->value['eid'];?>
"><?php echo L::text_yes;?>
</a>
            <?php } else { ?>
                <span class="text-muted"><?php echo L::text_no;?>
</span>
            <?php }?>
        </td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['dprt_id']) {
echo $_smarty_tpl->tpl_vars['item']->value['dprt_name'];
} else { ?><span class="text-muted">&mdash;</span><?php }?>
        </td>
        <td>
            <a href="mailto: <?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</a>
        </td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['phone']) {
echo $_smarty_tpl->tpl_vars['item']->value['phone'];
} else { ?><span class="text-muted">&mdash;</span><?php }?>
        </td>
        <td>
            <i class="fa fa-clock-o text-muted"></i> <?php if (!$_smarty_tpl->tpl_vars['item']->value['unix_activity_date']) {
echo smarty_modifier_mb_ucfirst(L::text_unknown);
} elseif (time()-$_smarty_tpl->tpl_vars['item']->value['unix_activity_date']<@constant('TIME_MIN')) {?>В течении минуты<?php } else {
echo smarty_modifier_pass_time($_smarty_tpl->tpl_vars['item']->value['unix_activity_date']);?>
 <?php echo L::text_ago;
}?>
        </td>
        <td class="text-right">
            <?php /*  Call merged included template "helpers/lists/actions.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/lists/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('module_id'=>$_smarty_tpl->tpl_vars['module_id']->value,'id'=>$_smarty_tpl->tpl_vars['item_id']->value,'denied_delete'=>($_smarty_tpl->tpl_vars['cuser_data']->value['id']==$_smarty_tpl->tpl_vars['item']->value['id']||$_smarty_tpl->tpl_vars['denied_delete']->value)), 0, '137905c5a30498a6a99-00572221');
content_5c5a3049ab6098_66357164($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/lists/actions.tpl" */?>
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:54:33
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\avatar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a30499b4352_63182572')) {function content_5c5a30499b4352_63182572($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['size']->value) {?>
    <?php $_smarty_tpl->tpl_vars["size"] = new Smarty_variable("xs", null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['size']->value=="xs") {?>
    <?php $_smarty_tpl->tpl_vars["size_px"] = new Smarty_variable("32px", null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['size']->value=="sm") {?>
    <?php $_smarty_tpl->tpl_vars["size_px"] = new Smarty_variable("128px", null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["size_px"] = new Smarty_variable("256px", null, 0);?>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['hash']->value) {?>
    <img width="<?php echo $_smarty_tpl->tpl_vars['size_px']->value;?>
" src="<?php /*  Call merged included template "helpers/storage_url.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['hash']->value,'dir'=>$_smarty_tpl->tpl_vars['dir']->value,'ext'=>"jpg",'thumb'=>$_smarty_tpl->tpl_vars['size']->value), 0, '137905c5a30498a6a99-00572221');
content_5c5a30499eae64_76922816($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/storage_url.tpl" */?>" alt="Avatar" class="img-avatar img-circle<?php if ($_smarty_tpl->tpl_vars['responsive']->value) {?> img-responsive<?php }?>" <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>data-user-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"<?php }?>>
<?php } else { ?>
    <img width="<?php echo $_smarty_tpl->tpl_vars['size_px']->value;?>
" src="<?php echo @constant('STORAGE_DIR');
echo $_smarty_tpl->tpl_vars['dir']->value;?>
default_<?php echo $_smarty_tpl->tpl_vars['size']->value;?>
.jpg" alt="Avatar" class="img-avatar img-circle <?php if ($_smarty_tpl->tpl_vars['responsive']->value) {?> img-responsive<?php }?>" <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>data-user-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"<?php }?>>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:54:33
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\storage_url.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a30499eae64_76922816')) {function content_5c5a30499eae64_76922816($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_storage_path')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.storage_path.php';
?><?php echo smarty_modifier_storage_path($_smarty_tpl->tpl_vars['hash']->value,$_smarty_tpl->tpl_vars['dir']->value);
if ($_smarty_tpl->tpl_vars['thumb']->value) {?>thumbs/<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['thumb']->value;
} else {
echo $_smarty_tpl->tpl_vars['hash']->value;
if ($_smarty_tpl->tpl_vars['name']->value) {?>/<?php echo $_smarty_tpl->tpl_vars['name']->value;
}
}?>.<?php if ($_smarty_tpl->tpl_vars['thumb']->value) {?>jpg<?php } else {
echo $_smarty_tpl->tpl_vars['ext']->value;
}?><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:54:33
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\lists\actions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a3049ab6098_66357164')) {function content_5c5a3049ab6098_66357164($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.replace.php';
if (!is_callable('smarty_modifier_access')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
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
