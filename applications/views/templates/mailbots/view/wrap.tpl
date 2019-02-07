<form class="form-horizontal form-clamped" role="form" method="post">

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_status}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">
                {if $mb_data.status}<i class="fa fa-toggle-on"></i> Включен
                {else}<i class="fa fa-toggle-off"></i> Выключен{/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_confirm}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">
                {if $mb_data.confirm}<i class="fa fa-toggle-on"></i> {L::text_yes}
                {else}<i class="fa fa-toggle-off"></i> {L::text_no}{/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_from_unknown}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">
                {if $mb_data.from_unknown}<i class="fa fa-toggle-on"></i> {L::text_yes}
                {else}<i class="fa fa-toggle-off"></i> {L::text_no}{/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::modules_categories_morph_one|mb_ucfirst}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">
                {if $mb_data.cat_id}{include file="helpers/catpath.tpl" id=$mb_data.cat_id}{*{$mb.cat_name}*}{else}{L::text_inbox}{/if}
            </p>
        </div>
    </div>

    <legend>{L::forms_legends_mailbots_mailbox}</legend>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_address}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">
                {$mb_data.address|default:L::text_not_specified}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_master}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">
                {if $mb_data.master}<i class="fa fa-flag text-danger"></i> {L::text_yes}
                {else}{L::text_no}{/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_protocol}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">
                {if !$mb_data.protocol}TCP{else}SSL{/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_server}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">{$mb_data.server|default:L::text_not_specified}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_port}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">{$mb_data.port|default:L::text_not_specified}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mailbots_login}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">{$mb_data.login|default:L::text_not_specified}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_password}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">{if cls_modules::MODULE_MAILBOTS|access:m_roles::CRUD_U}{$mb_data.password|default:L::text_not_specified}{else}{section name=foo start=1 loop=$mb_data.password|mb_strlen step=1}*{/section}{/if}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_descr}</label>
        <div class="col-sm-10 col-xs-8">
            <p class="form-control-static">
                {if $mb_data.descr}{$mb_data.descr}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}
            </p>
        </div>
    </div>


</form>
