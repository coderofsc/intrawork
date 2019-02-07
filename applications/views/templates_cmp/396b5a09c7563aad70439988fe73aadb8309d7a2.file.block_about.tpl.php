<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:23:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\users\view\block_about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160425c5a290f271743-76648142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '396b5a09c7563aad70439988fe73aadb8309d7a2' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_about.tpl',
      1 => 1449763096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160425c5a290f271743-76648142',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a290f284fc0_71673306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a290f284fc0_71673306')) {function content_5c5a290f284fc0_71673306($_smarty_tpl) {?><ul class="nav nav-tabs">
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
