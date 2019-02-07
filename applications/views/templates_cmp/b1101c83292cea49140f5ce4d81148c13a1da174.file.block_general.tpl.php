<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:37:52
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\contacts\form\block_general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3157559c4f6108c7562-80985042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1101c83292cea49140f5ce4d81148c13a1da174' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\block_general.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3157559c4f6108c7562-80985042',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
    'storage_field' => 0,
    'ar_types' => 0,
    'ar_errors_form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f610971093_42155202',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f610971093_42155202')) {function content_59c4f610971093_42155202($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.access.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><div class="row">
    <div class="col-sm-8 col-xs-12">

        <?php if (smarty_modifier_access(cls_modules::MODULE_CONTACTS,m_roles::CRUD_C)) {?>
        <div class="form-group">
            <label class="col-sm-3 col-xs-3 control-label">Общий контакт <i class="fa fa-question" data-toggle="popover" data-container="body" data-trigger="hover" data-placement="left" data-content="Включите этот режим, если хотите, чтобы этот контакт видели все."></i> </label>
            <div class="col-sm-3 col-xs-4" style="width:120px">
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['id']) {?>
                    <input id="contact_data_public" data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['public']) {?>checked<?php }?> name="contact_data[public]" value="1">
                <?php } else { ?>
                    <div class="input-group">
                        <input id="contact_data_public" data-style="android" data-width="100%" data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['public']) {?>checked<?php }?> name="contact_data[public]" value="1">
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="public" <?php if (in_array("public",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                        </span>
                    </div>
                <?php }?>

            </div>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['contact_data']->value['public']) {?>
            <input type="hidden" name="contact_data[public]" value="1">
        <?php }?>


        <div class="form-group">
            <label for="contact_data_type_id" class="col-sm-3 col-xs-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_contacts_types_morph_one);?>
</label>
            <div class="col-sm-7 col-xs-9">

                    <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['id']) {?>
                        <select name="contact_data[type_id]" id="contact_data_type_id" class="form-control selectpicker" data-live-search="true">
                            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_types']->value,'text'=>"name",'value'=>"id",'selected'=>$_smarty_tpl->tpl_vars['contact_data']->value['type_id']), 0);?>

                        </select>
                    <?php } else { ?>
                        <div class="input-group">
                            <select name="contact_data[type_id]" id="contact_data_type_id" class="form-control selectpicker" data-live-search="true">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_types']->value,'text'=>"name",'value'=>"id",'selected'=>$_smarty_tpl->tpl_vars['contact_data']->value['type_id']), 0);?>

                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="type_id" <?php if (in_array("type_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                            </span>
                        </div>
                    <?php }?>


            </div>
        </div>        

        <div class="form-group">
            <label for="contact_data_legal" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_contacts_legal;?>
</label>
            <div class="col-sm-7 col-xs-9">

                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['id']) {?>
                    <select name="contact_data[legal]" id="contact_data_legal" class="form-control selectpicker">
                        <?php echo $_smarty_tpl->getSubTemplate ("./legal_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </select>
                <?php } else { ?>
                    <div class="input-group">
                        <select name="contact_data[legal]" id="contact_data_legal" class="form-control selectpicker">
                            <?php echo $_smarty_tpl->getSubTemplate ("./legal_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </select>
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="legal" <?php if (in_array("legal",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                        </span>
                    </div>
                <?php }?>

            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']==@constant('LEGAL_PERSON')) {?>form-group-general<?php }?> legal-entity <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']!=@constant('LEGAL_PERSON')) {?>hidden<?php }?>">
            <label for="contact_data_opf" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_contacts_opf;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['id']) {?>
                    <input type="text" class="form-control" name="contact_data[opf]" id="contact_data_opf" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['opf'];?>
">
                <?php } else { ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="contact_data[opf]" id="contact_data_opf" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['opf'];?>
">
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="opf" <?php if (in_array("opf",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                        </span>
                    </div>
                <?php }?>
            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']==@constant('LEGAL_PERSON')) {?>form-group-general<?php }?> legal-entity <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']!=@constant('LEGAL_PERSON')) {?>hidden<?php }?> <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['company']) {?>has-error<?php }?>">
            <label for="contact_data_company" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_contacts_company_name;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['id']) {?>
                    <input type="text" class="form-control" name="contact_data[company]" id="contact_data_company" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['company'];?>
">
                <?php } else { ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="contact_data[company]" id="contact_data_company" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['company'];?>
">
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="company" <?php if (in_array("company",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                        </span>
                    </div>
                <?php }?>


            </div>
        </div>

        <legend class="legal-entity <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']!=@constant('LEGAL_PERSON')) {?>hidden<?php }?>"><?php echo L::forms_legends_spokesman;?>
</legend>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']!=@constant('LEGAL_PERSON')) {?>form-group-general<?php }?> <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['face_surname']) {?>has-error<?php }?>">
            <label for="contact_data_face_surname" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_face_surname;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <input data-rule-required="true" type="text" class="form-control" name="contact_data[face_surname]" id="contact_data_face_surname" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['face_surname'];?>
">
            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']!=@constant('LEGAL_PERSON')) {?>form-group-general<?php }?> <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['face_name']) {?>has-error<?php }?>">
            <label for="contact_data_face_name" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_face_name;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <input data-rule-required="true" type="text" class="form-control" name="contact_data[face_name]" id="contact_data_face_name" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['face_name'];?>
">
            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']!=@constant('LEGAL_PERSON')) {?>form-group-general<?php }?>">
            <label for="contact_data_face_patronymic" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_face_patronymic;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" class="form-control" name="contact_data[face_patronymic]" id="contact_data_face_patronymic" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['face_patronymic'];?>
">
            </div>
        </div>

    </div>

    <div class="col-sm-4 col-xs-9 col-sm-offset-0 col-xs-offset-3" style="z-index: 1">
        <?php echo $_smarty_tpl->getSubTemplate ("contacts/form/block_avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="clearfix"></div>
        <div class="space"></div>
    </div>
</div>

<?php }} ?>
