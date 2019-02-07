<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:13:11
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\form\block_attached.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111635c5aeb7766c777-13665899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d5ce2c8cb99324add067d02b93c17e0b4385a5b' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\form\\block_attached.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111635c5aeb7766c777-13665899',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aeb77674472_18592075',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aeb77674472_18592075')) {function content_5c5aeb77674472_18592075($_smarty_tpl) {?><div class="form-group">
    <label class="control-label col-sm-2"><?php echo L::forms_labels_demands_attach;?>
</label>
    <div class="col-sm-10">
        <?php echo $_smarty_tpl->getSubTemplate ("helpers/attached_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>
<?php }} ?>
