<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:53
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mrooms\view\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154735c5a2abd93a409-30905063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf7088592f157f062c539fda25535f0448f41ed4' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mrooms\\view\\layout.tpl',
      1 => 1433634064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154735c5a2abd93a409-30905063',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'mroom_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2abd9a3b90_04847456',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2abd9a3b90_04847456')) {function content_5c5a2abd9a3b90_04847456($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['controller_info']->value['pane']) {?>
    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value) {?>
        <div class="ui-layout-center animated fadeInDown">
            <div class="preview-container">
                <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php echo $_smarty_tpl->getSubTemplate ("mrooms/view/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>
    <?php } else { ?>
        <div class="ui-layout-center layout-preview bg-muted" id="mrooms-view-pane">
            <div class="preview-container cm-container"></div>
        </div>
    <?php }?>


    <div class="ui-layout-south pane-content" >
        <div class="container-fluid">
        <?php echo $_smarty_tpl->getSubTemplate ("mrooms/reservations/calendar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('modal'=>true), 0);?>

        </div>
    </div>
<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("mrooms/view/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php }} ?>
