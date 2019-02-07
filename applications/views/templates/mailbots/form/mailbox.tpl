<div class="form-group {if $ar_errors_form.address}has-error{/if}">
    <label for="mb_data_address" class="col-sm-3 control-label">{L::forms_labels_mailbots_address}</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[address]" id="mb_data_address" value="{$mb_data.address}">
    </div>
</div>

<div class="form-group">
    <label for="mb_data_master" class="col-sm-3 control-label">{L::forms_labels_mailbots_master}</label>
    <div class="col-sm-9">
        <input data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" type="checkbox" {if (!$mb_data.id && !$mailbot_master) || $mb_data.master}checked{/if} name="mb_data[master]" value="1">
        <div class="help-block">{L::forms_help_blocks_mailbots_master}</div>
    </div>
</div>


<div class="form-group">
    <label for="mb_data_protocol" class="col-sm-3 control-label">{L::forms_labels_mailbots_protocol}</label>
    <div class="col-sm-6">
        <select name="mb_data[protocol]" id="mb_data_protocol" class="form-control selectpicker" data-width="75px">
            <option {if !$mb_data.protocol}selected{/if} value="{$smarty.const.MB_POP3}">POP3</option>
            <option {if $mb_data.protocol == $smarty.const.MB_IMAP}selected{/if} value="{$smarty.const.MB_IMAP}">IMAP</option>
            <option {if $mb_data.protocol == $smarty.const.MB_NNTP}selected{/if} value="{$smarty.const.MB_NNTP}">NNTP</option>
        </select>
    </div>
</div>

<div class="form-group {if $ar_errors_form.server}has-error{/if}">
    <label for="mb_data_server" class="col-sm-3 control-label">{L::forms_labels_mailbots_server}</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[server]" id="mb_data_server" value="{$mb_data.server}">
    </div>
</div>

<div class="form-group {if $ar_errors_form.port}has-error{/if}">
    <label for="mb_data_port" class="col-sm-3 control-label">{L::forms_labels_mailbots_port}</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[port]" id="mb_data_port" value="{if !isset($mb_data.port)}995{else}{$mb_data.port}{/if}">
    </div>
</div>

<div class="form-group {if $ar_errors_form.login}has-error{/if}">
    <label for="mb_data_login" class="col-sm-3 control-label">{L::forms_labels_mailbots_login}</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[login]" id="mb_data_login" value="{$mb_data.login}">
    </div>
</div>

<div class="form-group {if $ar_errors_form.password}has-error{/if}">
    <label for="mb_data_password" class="col-sm-3 control-label">{L::forms_labels_password}</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[password]" id="mb_data_password" value="{$mb_data.password}">
    </div>
</div>

{include file="./regex.tpl"}