<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:54
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\navbar\li_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35295991b63a0afcb8-05106021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c629e8e076b83bf572c5dc115dd83b03e416a2b7' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\navbar\\li_extra.tpl',
      1 => 1454677112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35295991b63a0afcb8-05106021',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b63a0c8ca0_94485273',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b63a0c8ca0_94485273')) {function content_5991b63a0c8ca0_94485273($_smarty_tpl) {?><li class="dropdown border-left extra-nav">
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
