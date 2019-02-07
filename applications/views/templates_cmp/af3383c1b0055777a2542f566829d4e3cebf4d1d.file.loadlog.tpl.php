<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:54
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\modal\loadlog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157495991b63a14e800-86306548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af3383c1b0055777a2542f566829d4e3cebf4d1d' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\modal\\loadlog.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157495991b63a14e800-86306548',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'exec_time' => 0,
    'exec_query_time' => 0,
    'exec_php_time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b63a169512_06076512',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b63a169512_06076512')) {function content_5991b63a169512_06076512($_smarty_tpl) {?><div class="modal inmodal" id="modal-loadlog" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg ui-layout-lg ui-layout-md ui-layout-sm ui-layout-xs">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="place-modal-formLabel">Отчет по загрузке страницы</h4>
                <small class="text-muted">Общее время выполнения <?php echo round($_smarty_tpl->tpl_vars['exec_time']->value,3);?>
с. из них <?php echo round($_smarty_tpl->tpl_vars['exec_query_time']->value,3);?>
с. нагрузка БД и <?php echo round($_smarty_tpl->tpl_vars['exec_php_time']->value,3);?>
 выполнения скрипта PHP</small>
			</div>
			<div class="modal-body">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/querylog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</div>
		</div>
	</div>
</div>
<?php }} ?>
