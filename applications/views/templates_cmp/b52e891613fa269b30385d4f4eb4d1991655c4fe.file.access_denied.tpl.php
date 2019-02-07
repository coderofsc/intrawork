<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:02:56
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\access_denied.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17725c5ae9108cd308-40232995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b52e891613fa269b30385d4f4eb4d1991655c4fe' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\access_denied.tpl',
      1 => 1433120528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17725c5ae9108cd308-40232995',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5ae91091b514_56774486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5ae91091b514_56774486')) {function content_5c5ae91091b514_56774486($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">
    <div class="alert alert-danger">
        <h4>У вас нет доступа к этому модулю</h4>
        Обратитесь к администратору системы для расширения вашего набора прав.
    </div>
</div><?php }} ?>
