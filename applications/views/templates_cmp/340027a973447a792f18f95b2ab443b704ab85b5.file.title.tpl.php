<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:41
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\title.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151505c5a4311e0d8f9-11321970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '340027a973447a792f18f95b2ab443b704ab85b5' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\title.tpl',
      1 => 1455627310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151505c5a4311e0d8f9-11321970',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'conditions' => 0,
    'object_morph' => 0,
    'action' => 0,
    'name' => 0,
    'value' => 0,
    'breadcrumb' => 0,
    'system_alerts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4311ef7f38_92379082',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4311ef7f38_92379082')) {function content_5c5a4311ef7f38_92379082($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_declension')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.declension.php';
?>


<?php if (@constant('RENDER_MODE')!=@constant('RENDER_MODAL')) {?>
	<div class="container-fluid">
		<div class="page-heading">
            <table class="page-heading-table" width="100%">
                <colgroup>
                    <col width="*" />
                </colgroup>
                <tr>
                    <td>
                        <div class="title">
                            <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['title']) {
echo $_smarty_tpl->tpl_vars['controller_info']->value['title'];
} else {
echo L::text_unknown_controller;?>
!<?php }?>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['total']) {?>
                            <?php $_smarty_tpl->tpl_vars["object_morph"] = new Smarty_variable(implode($_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'],";"), null, 0);?>

                            <div class="small">
                                <?php if ($_smarty_tpl->tpl_vars['conditions']->value) {
echo L::text_found_total_conditions;
} else {
echo L::text_found_total;
}?> &mdash; <?php echo $_smarty_tpl->tpl_vars['controller_info']->value['total'];?>
 <?php echo smarty_modifier_declension($_smarty_tpl->tpl_vars['controller_info']->value['total'],$_smarty_tpl->tpl_vars['object_morph']->value);?>

                            </div>
                        <?php }?>
                    </td>
                    <td class="text-right" nowrap="true" valign="top">
                        <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['actions']) {?>
                            <div class="action-block">
                                <?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_info']->value['actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
                                    <a <?php if ($_smarty_tpl->tpl_vars['action']->value['data']) {
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['action']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['value']->key;
?>data-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"<?php }
}?> <?php if ($_smarty_tpl->tpl_vars['action']->value['modal']) {
if (!$_smarty_tpl->tpl_vars['action']->value['inline']) {?>href="#modal-remote" data-remote="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
"<?php } else { ?>href="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
"<?php }?> data-toggle="modal"<?php } else { ?>href="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
" <?php if ($_smarty_tpl->tpl_vars['action']->value['delete']) {?>data-callback="deleted_record" data-confirm-title="<?php echo L::crud_delete;?>
 <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']) {
echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'][1];
} else {
echo L::text_object_morph_two;
}?>" data-confirm="<?php echo L::confirm_delete_message;?>
"<?php }
}?> class="btn btn-<?php if ($_smarty_tpl->tpl_vars['action']->value['type']) {
echo $_smarty_tpl->tpl_vars['action']->value['type'];
} else { ?>default<?php }?> btn-sm<?php if ($_smarty_tpl->tpl_vars['action']->value['class']) {?> <?php echo $_smarty_tpl->tpl_vars['action']->value['class'];
}
if ($_smarty_tpl->tpl_vars['action']->value['delete']) {?> ajaxcall delete-record<?php }?>" title="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['action']->value['name']);?>
"><?php if ($_smarty_tpl->tpl_vars['action']->value['icon']) {?><i class="fa fa-<?php echo $_smarty_tpl->tpl_vars['action']->value['icon'];?>
"></i> <?php }
echo $_smarty_tpl->tpl_vars['action']->value['name'];?>
</a>
                                <?php } ?>
                            </div>
                        <?php }?>
                    </td>
                </tr>
            </table>
    		<div class="clearfix"></div>
		</div>
	</div>

    <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module_id']) {?>
    <?php echo '<script'; ?>
>
        var module_alias = '<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
';
        function deleted_record() {
            location.href = module_alias+'/';
        }
    <?php echo '</script'; ?>
>
    <?php }?>

	<?php if ($_smarty_tpl->tpl_vars['breadcrumb']->value!==false) {?>
        <div class="pull-left"><?php echo $_smarty_tpl->getSubTemplate ("main/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
	<?php }?>

    <?php echo $_smarty_tpl->getSubTemplate ("helpers/lists/sortgroup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_sort'=>$_smarty_tpl->tpl_vars['controller_info']->value['ar_sort'],'ar_group'=>$_smarty_tpl->tpl_vars['controller_info']->value['ar_group']), 0);?>


    


    <div class="clearfix"></div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['system_alerts']->value) {?>
    <div class="container-fluid">
        <?php echo $_smarty_tpl->getSubTemplate ("helpers/alerts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div class="space"></div>
<?php }?>
<?php }} ?>
