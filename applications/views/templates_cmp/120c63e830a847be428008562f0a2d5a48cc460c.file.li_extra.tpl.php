<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\navbar\li_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184105c5a4312a97032-10322098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '120c63e830a847be428008562f0a2d5a48cc460c' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\navbar\\li_extra.tpl',
      1 => 1454677112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184105c5a4312a97032-10322098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4312aaa8c3_80889415',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4312aaa8c3_80889415')) {function content_5c5a4312aaa8c3_80889415($_smarty_tpl) {?><li class="dropdown border-left extra-nav">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li>
            <a href="#" data-toggle="fullscreen">
                Во весь экран
            </a>
        </li>
        <li>
            <a href="#"  id="start-tour">
                
                <?php echo L::navbar_tour;?>

            </a>
        </li>
        <li>
            <a href="trash/">
                Корзина
            </a>
        </li>
        <li class="divider"></li>
        <li><a href="about/"><?php echo L::navbar_setup_dd_about;?>
</a></li>

        <?php if ($_smarty_tpl->tpl_vars['config']->value->dev_mode) {?>
            <li class="divider"></li>
            <li>
                <a href="#modal-loadlog" data-toggle="modal">
                    Статистика загрузки страницы
                </a>
            </li>
            <li>
                <a data-toggle="modal" href="#modal-remote" data-remote="phpinfo/">
                    Конфигурация PHP
                </a>
            </li>
        <?php }?>
        <li class="divider"></li>
        <li>
            <a href="logout/">
                <?php echo L::navbar_profile_dd_exit;?>

            </a>
        </li>

    </ul>
</li>
<?php }} ?>
