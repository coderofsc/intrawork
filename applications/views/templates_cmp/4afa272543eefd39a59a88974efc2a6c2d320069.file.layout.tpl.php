<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:04:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:268595c5a3287b26a93-27811980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4afa272543eefd39a59a88974efc2a6c2d320069' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\layout.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '268595c5a3287b26a93-27811980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3287bb34b2_96014405',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3287bb34b2_96014405')) {function content_5c5a3287bb34b2_96014405($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">

	<form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab"><?php echo L::tabs_general;?>
</a></li>
            <li class="legal-entity <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']!=@constant('LEGAL_PERSON')) {?>hidden<?php }?>"><a href="#bank-details" data-toggle="tab"><?php echo L::tabs_bank_details;?>
</a></li>
            <li><a href="#contacts" data-toggle="tab"><?php echo L::tabs_contacts;?>
</a></li>
            <li><a href="#extra" data-toggle="tab"><?php echo L::tabs_extra;?>
</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="general">
                <?php echo $_smarty_tpl->getSubTemplate ("contacts/form/block_general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="tab-pane legal-entity <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']!=@constant('LEGAL_PERSON')) {?>hidden<?php }?>" id="bank-details">
                <?php echo $_smarty_tpl->getSubTemplate ("contacts/form/block_bank_details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="tab-pane" id="contacts">
                <?php echo $_smarty_tpl->getSubTemplate ("contacts/form/block_contacts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="tab-pane" id="extra">
                <?php echo $_smarty_tpl->getSubTemplate ("contacts/form/block_extra.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['contact_data']->value['id'])), 0);?>

    </form>
</div>



<?php echo '<script'; ?>
>
    $("#contact_data_legal").on("change", function() {
        $(".legal-entity").toggleClass('hidden');
    });
<?php echo '</script'; ?>
><?php }} ?>
