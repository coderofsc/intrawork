<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\helpers\querylog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24875c5a4312b5e3e5-03769381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdbe2ae05858478c5e947d0a82bdd5171cfe78ef' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\helpers\\querylog.tpl',
      1 => 1549349759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24875c5a4312b5e3e5-03769381',
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
  'unifunc' => 'content_5c5a4312bac5f7_85908968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4312bac5f7_85908968')) {function content_5c5a4312bac5f7_85908968($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.truncate.php';
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

    <tbody>
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
    </tbody>
</table><?php }} ?>
