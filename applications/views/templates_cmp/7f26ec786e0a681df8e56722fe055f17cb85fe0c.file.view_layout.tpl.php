<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:36:01
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\view_layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2642259c4f5a161f941-51999694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f26ec786e0a681df8e56722fe055f17cb85fe0c' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\view_layout.tpl',
      1 => 1454680262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2642259c4f5a161f941-51999694',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f5a1662bc0_74441127',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f5a1662bc0_74441127')) {function content_59c4f5a1662bc0_74441127($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['controller_info']->value['pane']) {?>

    <?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
        <div class="ui-pane-header ui-pane-header-pager">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/lists/next_prev.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('np_calc'=>true,'id'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

        </div>
        <div class="ui-layout-content">
            <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <div class="container-fluid">
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'])."/view/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']['comments']) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("comments/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
            </div>
        </div>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

    
    <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']['comments']) {?>
        <div class="ui-layout-center">
            <?php echo Smarty::$_smarty_vars['capture']['content'];?>

        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("comments/pane.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('owner_id'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

    <?php } else { ?>
        <?php echo Smarty::$_smarty_vars['capture']['content'];?>

    <?php }?>
<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container-fluid">
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'])."/view/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']['comments']) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("comments/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
    </div>
<?php }?>


<?php }} ?>
