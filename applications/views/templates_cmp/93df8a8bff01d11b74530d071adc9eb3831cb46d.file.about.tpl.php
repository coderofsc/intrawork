<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:37:42
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:440459c4f5cfea8837-71683754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93df8a8bff01d11b74530d071adc9eb3831cb46d' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\about.tpl',
      1 => 1506080260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '440459c4f5cfea8837-71683754',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f5d0015507_96345302',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f5d0015507_96345302')) {function content_59c4f5d0015507_96345302($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">
    <h4 class="clamped-margin-top">
        <strong>Интраворк</strong> версия <?php echo @constant('IW_VERSION');?>
<br/>
    </h4>
    <p>
        Организация совместной работы людей и их поддержка<br/>
        Сайт: <a href="http://intrawork.ru">http://intrawork.ru</a><br/>
        Поддержка: <a href="mailto:support@intrawork.ru">support@intrawork.ru</a>
    </p>

    <p>
        Разработано © 2007-<?php echo smarty_modifier_date_format(time(),"%Y");?>
 Исходный код<br/>
        Программирование и дизайн: Юрьев Алексей <a href="mailto:a.yuriev@src-code.ru">a.yuriev@src-code.ru</a><br/>
        <a href="http://src-code.ru">http://www.src-code.ru</a>
    </p>
</div><?php }} ?>
