<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:15
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\dashboard\events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204165c5a467b89ae96-43228249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '160e5d28a627e2666cd79b2cda4486b6b906a09f' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\dashboard\\events.tpl',
      1 => 1438297572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204165c5a467b89ae96-43228249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_events' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a467b8aa895_59685905',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a467b8aa895_59685905')) {function content_5c5a467b8aa895_59685905($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ar_events']->value['data']) {?>
<?php echo $_smarty_tpl->getSubTemplate ("events/timeline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_events']->value['data']), 0);?>

<?php } else { ?>
    <div class="alert alert-default">За прошедшие семь дней событий не обнаружено. <a href="/events/">Смотрите список событий</a>.</div>


<?php }?>
<?php }} ?>
