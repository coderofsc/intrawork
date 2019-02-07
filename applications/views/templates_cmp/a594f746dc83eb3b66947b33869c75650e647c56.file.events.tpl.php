<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:29:01
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\dashboard\events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:500559c4f3fd962224-59137875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a594f746dc83eb3b66947b33869c75650e647c56' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\dashboard\\events.tpl',
      1 => 1438297572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '500559c4f3fd962224-59137875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_events' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f3fd977d80_48232687',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f3fd977d80_48232687')) {function content_59c4f3fd977d80_48232687($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ar_events']->value['data']) {?>
<?php echo $_smarty_tpl->getSubTemplate ("events/timeline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_events']->value['data']), 0);?>

<?php } else { ?>
    <div class="alert alert-default">За прошедшие семь дней событий не обнаружено. <a href="/events/">Смотрите список событий</a>.</div>


<?php }?>
<?php }} ?>
