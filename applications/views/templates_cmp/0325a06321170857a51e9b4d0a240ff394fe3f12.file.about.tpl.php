<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:41
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147615c5a4311d908d0-31577844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0325a06321170857a51e9b4d0a240ff394fe3f12' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\about.tpl',
      1 => 1506080260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147615c5a4311d908d0-31577844',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4311df2376_27338444',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4311df2376_27338444')) {function content_5c5a4311df2376_27338444($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.date_format.php';
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
