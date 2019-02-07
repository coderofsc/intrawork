<p>{if $cuser_data}{L::modules_users_morph_one|mb_ucfirst} <a href="{$smarty.const.HOST_ROOT}users/view/{$cuser_data.id}/">{$cuser_data.short_fio}</a>{else}{L::intrawork}{/if} {L::modules_events_crud_update} {L::text_object_morph_one} &mdash; {$object_name} «<a href="{$smarty.const.HOST_ROOT}{$module_info.alias}/view/{$object_id}/">{$item_name}</a>»
<br/><br/>

{include file="./record_table.tpl" previous=true}


