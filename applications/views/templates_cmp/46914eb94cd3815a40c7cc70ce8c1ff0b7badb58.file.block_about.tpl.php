<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:06
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\view\block_about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149915c5a29da1182a9-70748660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46914eb94cd3815a40c7cc70ce8c1ff0b7badb58' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\view\\block_about.tpl',
      1 => 1450950474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149915c5a29da1182a9-70748660',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29da13f3a4_89423323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29da13f3a4_89423323')) {function content_5c5a29da13f3a4_89423323($_smarty_tpl) {?><ul class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab"><?php echo L::tabs_general;?>
</a></li>
    <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']==@constant('LEGAL_PERSON')) {?><li class="legal-entity"><a href="#bank-details" data-toggle="tab"><?php echo L::tabs_bank_details;?>
</a></li><?php }?>
    <li><a href="#extra" data-toggle="tab"><?php echo L::tabs_extra;?>
</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane clamped active" id="general">
        <?php echo $_smarty_tpl->getSubTemplate ("contacts/view/block_general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']==@constant('LEGAL_PERSON')) {?>
    <div class="tab-pane clamped" id="bank-details">
        <?php echo $_smarty_tpl->getSubTemplate ("contacts/view/block_bank_details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <?php }?>
    <div class="tab-pane clamped" id="extra">
        <?php echo $_smarty_tpl->getSubTemplate ("contacts/view/block_extra.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>

</div>

<?php }} ?>
