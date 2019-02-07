<div class="row">
    <div class="col-sm-8 col-xs-12">

        {if cls_modules::MODULE_CONTACTS|access:m_roles::CRUD_C}
        <div class="form-group">
            <label class="col-sm-3 col-xs-3 control-label">Общий контакт <i class="fa fa-question" data-toggle="popover" data-container="body" data-trigger="hover" data-placement="left" data-content="Включите этот режим, если хотите, чтобы этот контакт видели все."></i> </label>
            <div class="col-sm-3 col-xs-4" style="width:120px">
                {if $contact_data.id}
                    <input id="contact_data_public" data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" type="checkbox" {if $contact_data.public}checked{/if} name="contact_data[public]" value="1">
                {else}
                    <div class="input-group">
                        <input id="contact_data_public" data-style="android" data-width="100%" data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" type="checkbox" {if $contact_data.public}checked{/if} name="contact_data[public]" value="1">
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="public" {if in_array("public", $storage_field)}checked=""{/if}>
                        </span>
                    </div>
                {/if}

            </div>
        </div>
        {elseif $contact_data.public}
            <input type="hidden" name="contact_data[public]" value="1">
        {/if}


        <div class="form-group">
            <label for="contact_data_type_id" class="col-sm-3 col-xs-3 control-label">{L::modules_contacts_types_morph_one|mb_ucfirst}</label>
            <div class="col-sm-7 col-xs-9">

                    {if $contact_data.id}
                        <select name="contact_data[type_id]" id="contact_data_type_id" class="form-control selectpicker" data-live-search="true">
                            {include file="helpers/forms/options.tpl" empty=true data=$ar_types text="name" value="id" selected=$contact_data.type_id}
                        </select>
                    {else}
                        <div class="input-group">
                            <select name="contact_data[type_id]" id="contact_data_type_id" class="form-control selectpicker" data-live-search="true">
                                {include file="helpers/forms/options.tpl" empty=true data=$ar_types text="name" value="id" selected=$contact_data.type_id}
                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="type_id" {if in_array("type_id", $storage_field)}checked=""{/if}>
                            </span>
                        </div>
                    {/if}


            </div>
        </div>        

        <div class="form-group">
            <label for="contact_data_legal" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_contacts_legal}</label>
            <div class="col-sm-7 col-xs-9">

                {if $contact_data.id}
                    <select name="contact_data[legal]" id="contact_data_legal" class="form-control selectpicker">
                        {include file="./legal_options.tpl"}
                    </select>
                {else}
                    <div class="input-group">
                        <select name="contact_data[legal]" id="contact_data_legal" class="form-control selectpicker">
                            {include file="./legal_options.tpl"}
                        </select>
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="legal" {if in_array("legal", $storage_field)}checked=""{/if}>
                        </span>
                    </div>
                {/if}

            </div>
        </div>

        <div class="form-group {if $contact_data.legal == $smarty.const.LEGAL_PERSON}form-group-general{/if} legal-entity {if $contact_data.legal != $smarty.const.LEGAL_PERSON}hidden{/if}">
            <label for="contact_data_opf" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_contacts_opf}</label>
            <div class="col-sm-7 col-xs-9">
                {if $contact_data.id}
                    <input type="text" class="form-control" name="contact_data[opf]" id="contact_data_opf" value="{$contact_data.opf}">
                {else}
                    <div class="input-group">
                        <input type="text" class="form-control" name="contact_data[opf]" id="contact_data_opf" value="{$contact_data.opf}">
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="opf" {if in_array("opf", $storage_field)}checked=""{/if}>
                        </span>
                    </div>
                {/if}
            </div>
        </div>

        <div class="form-group {if $contact_data.legal == $smarty.const.LEGAL_PERSON}form-group-general{/if} legal-entity {if $contact_data.legal != $smarty.const.LEGAL_PERSON}hidden{/if} {if $ar_errors_form.company}has-error{/if}">
            <label for="contact_data_company" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_contacts_company_name}</label>
            <div class="col-sm-7 col-xs-9">
                {if $contact_data.id}
                    <input type="text" class="form-control" name="contact_data[company]" id="contact_data_company" value="{$contact_data.company}">
                {else}
                    <div class="input-group">
                        <input type="text" class="form-control" name="contact_data[company]" id="contact_data_company" value="{$contact_data.company}">
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="company" {if in_array("company", $storage_field)}checked=""{/if}>
                        </span>
                    </div>
                {/if}


            </div>
        </div>

        <legend class="legal-entity {if $contact_data.legal != $smarty.const.LEGAL_PERSON}hidden{/if}">{L::forms_legends_spokesman}</legend>

        <div class="form-group {if $contact_data.legal != $smarty.const.LEGAL_PERSON}form-group-general{/if} {if $ar_errors_form.face_surname}has-error{/if}">
            <label for="contact_data_face_surname" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_face_surname}</label>
            <div class="col-sm-7 col-xs-9">
                <input data-rule-required="true" type="text" class="form-control" name="contact_data[face_surname]" id="contact_data_face_surname" value="{$contact_data.face_surname}">
            </div>
        </div>

        <div class="form-group {if $contact_data.legal != $smarty.const.LEGAL_PERSON}form-group-general{/if} {if $ar_errors_form.face_name}has-error{/if}">
            <label for="contact_data_face_name" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_face_name}</label>
            <div class="col-sm-7 col-xs-9">
                <input data-rule-required="true" type="text" class="form-control" name="contact_data[face_name]" id="contact_data_face_name" value="{$contact_data.face_name}">
            </div>
        </div>

        <div class="form-group {if $contact_data.legal != $smarty.const.LEGAL_PERSON}form-group-general{/if}">
            <label for="contact_data_face_patronymic" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_face_patronymic}</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" class="form-control" name="contact_data[face_patronymic]" id="contact_data_face_patronymic" value="{$contact_data.face_patronymic}">
            </div>
        </div>

    </div>

    <div class="col-sm-4 col-xs-9 col-sm-offset-0 col-xs-offset-3{* text-center*}" style="z-index: 1">
        {include file="contacts/form/block_avatar.tpl"}
        <div class="clearfix"></div>
        <div class="space"></div>
    </div>
</div>

