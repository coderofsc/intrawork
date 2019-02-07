<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\form\block_attached.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287695c5a266549c245-86427939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28278ad20f37be5b627e733f20906c91514c62b2' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\form\\block_attached.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287695c5a266549c245-86427939',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a26654a00c0_73300155',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a26654a00c0_73300155')) {function content_5c5a26654a00c0_73300155($_smarty_tpl) {?><div class="form-group">
    <label class="control-label col-sm-2"><?php echo L::forms_labels_demands_attach;?>
</label>
    <div class="col-sm-10">
        <?php echo $_smarty_tpl->getSubTemplate ("helpers/attached_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>
<?php }} ?>
