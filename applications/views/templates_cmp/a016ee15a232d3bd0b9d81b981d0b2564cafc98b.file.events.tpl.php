<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:46
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\dashboard\events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140695c5a2282c7c3a4-61505898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a016ee15a232d3bd0b9d81b981d0b2564cafc98b' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\dashboard\\events.tpl',
      1 => 1438297572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140695c5a2282c7c3a4-61505898',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_events' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2282c8fc31_63633862',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2282c8fc31_63633862')) {function content_5c5a2282c8fc31_63633862($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ar_events']->value['data']) {?>
<?php echo $_smarty_tpl->getSubTemplate ("events/timeline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_events']->value['data']), 0);?>

<?php } else { ?>
    <div class="alert alert-default">За прошедшие семь дней событий не обнаружено. <a href="/events/">Смотрите список событий</a>.</div>


<?php }?>
<?php }} ?>
