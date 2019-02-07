<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:30
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\users\view\block_about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:281435a04282ec8b795-31349292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85ff55e34acef418e5b17b736af25aa604121f56' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_about.tpl',
      1 => 1449763096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281435a04282ec8b795-31349292',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a04282eca0b10_84127276',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04282eca0b10_84127276')) {function content_5a04282eca0b10_84127276($_smarty_tpl) {?><ul class="nav nav-tabs">
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
