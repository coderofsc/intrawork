<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:16:35
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\users\view\block_about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180785c5ade338dc902-44825053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '070d3be0f822d040b3009384a61d0d45a4237782' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\users\\view\\block_about.tpl',
      1 => 1449763096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180785c5ade338dc902-44825053',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5ade338f0188_90858043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5ade338f0188_90858043')) {function content_5c5ade338f0188_90858043($_smarty_tpl) {?><ul class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab"><?php echo L::tabs_general;?>
</a></li>
    <li><a href="#extra" data-toggle="tab"><?php echo L::tabs_extra;?>
</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane clamped active" id="general">
        <?php echo $_smarty_tpl->getSubTemplate ("users/view/block_general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div class="tab-pane clamped" id="extra">
        <?php echo $_smarty_tpl->getSubTemplate ("users/view/block_extra.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>

</div>

<?php }} ?>
