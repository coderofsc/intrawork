<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:54
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\querylog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265865991b63a178806-75020274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b2a316a7b430f90be31dab74392c759b7871b82' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\querylog.tpl',
      1 => 1427622496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265865991b63a178806-75020274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_query' => 0,
    'hash' => 0,
    'ar_query_time' => 0,
    'item' => 0,
    'trace_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b63a1d84a4_74179783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b63a1d84a4_74179783')) {function content_5991b63a1d84a4_74179783($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.truncate.php';
?><table class="table">
	<colgroup>
		<col width="80%" />
		<col width="*" />
	</colgroup>
	<thead>
	<th>Запрос</th>
	<th>Время</th>
	<th>Результат</th>
	</thead>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['hash'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_query']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['hash']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<tr <?php if ($_smarty_tpl->tpl_vars['ar_query_time']->value[$_smarty_tpl->tpl_vars['hash']->value]>1||!$_smarty_tpl->tpl_vars['item']->value['result']) {?>class="danger"<?php } elseif ($_smarty_tpl->tpl_vars['ar_query_time']->value[$_smarty_tpl->tpl_vars['hash']->value]>0.5) {?>class="warning"<?php }?>>
			<td>
				<?php echo smarty_modifier_truncate(trim($_smarty_tpl->tpl_vars['item']->value['query']));?>

				<a href="#" onclick="$(this).parent().find('.formated').slideToggle(); return false;">Форматировать</a> <a href="#" onclick="$(this).parent().find('.trace').slideToggle(); return false;">Трейс</a>

				<div style="display: none" class="formated">
					<b>Запрос</b>
                    <?php echo SqlFormatter::format($_smarty_tpl->tpl_vars['item']->value['query']);?>

				</div>

				<div style="display: none" class="trace">
					<b>Трассировка</b>
					<ol style="margin: auto;">
						<?php  $_smarty_tpl->tpl_vars['trace_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['trace_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['trace']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['trace_item']->key => $_smarty_tpl->tpl_vars['trace_item']->value) {
$_smarty_tpl->tpl_vars['trace_item']->_loop = true;
?>
							<li><?php echo $_smarty_tpl->tpl_vars['trace_item']->value['file'];?>
 (<?php echo $_smarty_tpl->tpl_vars['trace_item']->value['line'];?>
): функция/метод "<?php echo $_smarty_tpl->tpl_vars['trace_item']->value['function'];?>
" класс "<?php echo $_smarty_tpl->tpl_vars['trace_item']->value['class'];?>
"</li>
						<?php } ?>
					</ol>
				</div>

			</td>
			<td>
				<?php echo round($_smarty_tpl->tpl_vars['ar_query_time']->value[$_smarty_tpl->tpl_vars['hash']->value],3);?>

			</td>
			<td>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['result']) {?><i class="fa fa-check"></i><?php } else { ?><i class="text-danger fa fa-times"></i><?php }?>
			</td>
		</tr>
	<?php } ?>
</table><?php }} ?>
