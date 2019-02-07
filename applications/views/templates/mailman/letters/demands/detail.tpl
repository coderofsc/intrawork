<div style="color: #a1a1a1; font-size:12px;">
<hr style="margin-bottom:6px;height:1px;border:none;color:#cfcfcf;background-color:#cfcfcf;"/>
<strong>{L::mailman_request_details}</strong><br/>
{L::mailman_request_id}: {$demand_id}<br/>
{L::modules_categories_morph_one|mb_ucfirst}: {if $cat_id}{include file="helpers/catpath.tpl" id=$cat_id}{else}{L::text_inbox}{/if}<br/>
{if $message_data.user_to_id}
    Ссылка: <a href="{$smarty.const.HOST_ROOT}demands/view/{$demand_id}/">{$smarty.const.HOST_ROOT}demands/view/{$demand_id}/</a>
{/if}
</div>