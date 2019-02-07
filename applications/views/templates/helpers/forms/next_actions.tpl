{assign var="next_redirect" value=$smarty.session.next_redirect[$controller_info.module.alias]}

<select class="selectpicker" name="next_redirect" data-width="170px">
	<option {if !next_redirect || $next_redirect == $smarty.const.FORM_NA_LIST}selected=""{/if} value="{$smarty.const.FORM_NA_LIST}">{L::next_actions_list}</option>
    <option {if $next_redirect == $smarty.const.FORM_NA_VIEW}selected=""{/if} value="{$smarty.const.FORM_NA_VIEW}">{L::next_actions_view} {$module.morph.3}</option>
	<option data-divider="true"></option>
    <option {if $next_redirect == $smarty.const.FORM_NA_CREATE}selected=""{/if} value="{$smarty.const.FORM_NA_CREATE}">{L::next_actions_create}</option>
    {if $controller_info.module_id == cls_modules::MODULE_DEMANDS && $parent_data}
    <option {if $next_redirect == $smarty.const.FORM_NA_JOIN}selected=""{/if} value="{$smarty.const.FORM_NA_JOIN}">{L::next_actions_join}</option>
    {/if}
    <option data-divider="true"></option>
    <option {if $next_redirect === $smarty.const.FORM_NA_STAY}selected=""{/if} value="{$smarty.const.FORM_NA_STAY}">{L::next_actions_stay}</option>
</select>{if !isset($reset) || $reset==true} или <button class="btn btn-default btn-form-reset"><i class="fa fa-undo"></i> <span class="hidden-xs">{L::actions_reset}</span></button>{/if}