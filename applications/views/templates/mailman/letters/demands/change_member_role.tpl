<p>{if $cuser_data}{L::modules_users_morph_one|mb_ucfirst} <a href="{$smarty.const.HOST_ROOT}users/view/{$cuser_data.id}/">{$cuser_data.short_fio}</a>{else}{L::intrawork}{/if} {if $action}назначил вас на роль{else}снял вас с роли{/if} {if $role == $smarty.const.ROLE_EXECUTOR}исполнителя{else}ответственного{/if} заявки &mdash; «<a href="{$smarty.const.HOST_ROOT}demands/view/{$demand_data.id}/">{$demand_data.title}</a>»
<br/>
{include file="./detail.tpl" demand_id=$demand_data.id cat_id=$demand_data.cat_id}
