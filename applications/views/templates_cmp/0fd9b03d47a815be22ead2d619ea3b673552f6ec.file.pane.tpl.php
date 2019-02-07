<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:48:52
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\comments\pane.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301115c5af3d4b449b4-33784323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fd9b03d47a815be22ead2d619ea3b673552f6ec' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\comments\\pane.tpl',
      1 => 1454682874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301115c5af3d4b449b4-33784323',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'owner_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af3d4b5c0c1_39558889',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af3d4b5c0c1_39558889')) {function content_5c5af3d4b5c0c1_39558889($_smarty_tpl) {?><form id="comment-form">
    <div class="ui-layout-south pane-content-sm" id="comment-form-pane">
        <?php echo $_smarty_tpl->getSubTemplate ("./form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</form>

<?php echo $_smarty_tpl->getSubTemplate ("./pane_toggler.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo '<script'; ?>
 src="resources/js/intrawork.comments.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {
        commentsIW.init('<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
', <?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module_id'];?>
, <?php echo intval($_smarty_tpl->tpl_vars['owner_id']->value);?>
);
    });
<?php echo '</script'; ?>
>
<?php }} ?>
