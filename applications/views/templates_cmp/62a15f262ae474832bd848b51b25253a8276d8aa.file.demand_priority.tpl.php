<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\helpers\forms\demand_priority.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45575c5a469085d315-66277649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62a15f262ae474832bd848b51b25253a8276d8aa' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\helpers\\forms\\demand_priority.tpl',
      1 => 1451393678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45575c5a469085d315-66277649',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'read' => 0,
    'clear' => 0,
    'value' => 0,
    'options' => 0,
    'only' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4690918b46_36105504',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4690918b46_36105504')) {function content_5c5a4690918b46_36105504($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['read']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['clear']->value) {?>
        <?php echo m_demands::decode_priority($_smarty_tpl->tpl_vars['value']->value);?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
)
    <?php } else { ?>
        <span class="label label-success"><?php echo m_demands::decode_priority($_smarty_tpl->tpl_vars['value']->value);?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
)</span>
    <?php }?>

<?php } elseif ($_smarty_tpl->tpl_vars['options']->value) {?>
    <option <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array(0,$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!==0))) {?>disabled<?php }?> value="0" <?php if ((is_array($_smarty_tpl->tpl_vars['value']->value)&&in_array(0,$_smarty_tpl->tpl_vars['value']->value))||$_smarty_tpl->tpl_vars['value']->value===0) {?>selected=""<?php }?>><?php echo L::modules_demands_priority_low;?>
 (0-100)</option>
    <option <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array(100,$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!=100))) {?>disabled<?php }?> value="100" <?php if ((is_array($_smarty_tpl->tpl_vars['value']->value)&&in_array(100,$_smarty_tpl->tpl_vars['value']->value))||$_smarty_tpl->tpl_vars['value']->value>100&&$_smarty_tpl->tpl_vars['value']->value<=200) {?>selected=""<?php }?>><?php echo L::modules_demands_priority_mid;?>
 (100-200)</option>
    <option <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array(200,$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!=200))) {?>disabled<?php }?> value="200" <?php if ((is_array($_smarty_tpl->tpl_vars['value']->value)&&in_array(200,$_smarty_tpl->tpl_vars['value']->value))||$_smarty_tpl->tpl_vars['value']->value>200&&$_smarty_tpl->tpl_vars['value']->value<=300) {?>selected=""<?php }?>><?php echo L::modules_demands_priority_hi;?>
 (200-300)</option>
<?php } else { ?>

    <input name="demand_data[priority]" id="demand_data_priority" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" />

    <?php echo '<script'; ?>
>
        $().ready( function() {
            $("#demand_data_priority").ionRangeSlider({
                min: 1,
                max: 300,
                from: 100,
                grid: false,
                force_edges: true,

                prettify: function (num) {
                    var level = '';
                    if (num >= 200) {
                        level = '<?php echo L::modules_demands_priority_hi;?>
';
                    } else if (num >= 100) {
                        level = '<?php echo L::modules_demands_priority_mid;?>
';
                    } else {
                        level = '<?php echo L::modules_demands_priority_low;?>
';
                    }

                    return level + ' (' + num + ')';
                }
            });
        });
    <?php echo '</script'; ?>
>
<?php }?>

<?php }} ?>
