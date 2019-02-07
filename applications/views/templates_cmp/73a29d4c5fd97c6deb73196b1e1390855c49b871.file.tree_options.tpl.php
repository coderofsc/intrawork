<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\abstracts\tree_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:313685c5a227fc7f771-62413314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73a29d4c5fd97c6deb73196b1e1390855c49b871' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\abstracts\\tree_options.tpl',
      1 => 1449567882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313685c5a227fc7f771-62413314',
  'function' => 
  array (
    'menu' => 
    array (
      'parameter' => 
      array (
        'nested' => 0,
        'selected' => 0,
        'parent_label' => '',
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'selected' => 0,
    'root' => 0,
    'empty' => 0,
    'tree' => 0,
    'nested' => 0,
    'item' => 0,
    'parent_label' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a227fd1fa14_86460044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a227fd1fa14_86460044')) {function content_5c5a227fd1fa14_86460044($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['selected']->value)) {?>
    <?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(-999, null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['root']->value) {?>
    <option value="0">Верхний уровень</option>
    <option data-divider="true"></option>
<?php } elseif ($_smarty_tpl->tpl_vars['empty']->value) {?>
    <option value="0"></option>
<?php }?>

<?php if (!function_exists('smarty_template_function_menu')) {
    function smarty_template_function_menu($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['menu']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tree']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>

        <?php $_smarty_tpl->_capture_stack[0][] = array('label', null, null); ob_start(); ?>
            <span class='dropdown-only'>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['name'] = 'foo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = (int) 0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nested']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total']);
?>
                &nbsp;&nbsp;&nbsp;
            <?php endfor; endif; ?>
             </span>
            <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

        
            <option data-content="<?php if ($_smarty_tpl->tpl_vars['item']->value['bgcolor']) {?><i class='fa fa-circle sp-icon' style='color: <?php echo $_smarty_tpl->tpl_vars['item']->value['bgcolor'];?>
'></i> <?php }
echo htmlspecialchars(Smarty::$_smarty_vars['capture']['label']);
if ($_smarty_tpl->tpl_vars['nested']->value) {?> <small class='text-muted select-only'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['parent_label']->value);?>
</small><?php }?>" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['selected']->value==$_smarty_tpl->tpl_vars['key']->value||(is_array($_smarty_tpl->tpl_vars['selected']->value)&&in_array($_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['selected']->value))) {?>selected=""<?php }?>>
                <?php echo Smarty::$_smarty_vars['capture']['label'];?>

            </option>
        

        <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
            <?php $_smarty_tpl->_capture_stack[0][] = array('parent_label', null, null); ob_start();
if ($_smarty_tpl->tpl_vars['parent_label']->value) {
echo $_smarty_tpl->tpl_vars['parent_label']->value;?>
&nbsp;/&nbsp;<?php }
echo $_smarty_tpl->tpl_vars['item']->value['name'];
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php smarty_template_function_menu($_smarty_tpl,array('tree'=>$_smarty_tpl->tpl_vars['item']->value['children'],'nested'=>$_smarty_tpl->tpl_vars['nested']->value+1,'selected'=>$_smarty_tpl->tpl_vars['selected']->value,'parent_label'=>Smarty::$_smarty_vars['capture']['parent_label']));?>

        <?php }?>
    <?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php smarty_template_function_menu($_smarty_tpl,array('tree'=>$_smarty_tpl->tpl_vars['tree']->value,'nested'=>0,'selected'=>$_smarty_tpl->tpl_vars['selected']->value));?>

<?php }} ?>
