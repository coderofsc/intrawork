<p>{L::mailman_letters_before_complete_query|sprintf:($demand_data.answer_passed_time|ts2hours:true:true)}</p>

<p>{L::mailman_letters_before_complete_close_in|sprintf:($demand_data.auto_complete_remain|ts2hours:true:true)} .
{if $demand_data.user_id}<br/>{L::mailman_letters_before_complete_find}{/if}
</p>

{L::mailman_letters_before_complete_another_quest|sprintf:$demand_data.mb_address}
{*<p>Если у вас возникнет другой вопрос, вы всегда можете обратиться к нам {if $demand_data.user_id}из Интраворк «Заявки» - «Создать» или{/if}, написав письмо на адрес {$demand_data.mb_address}.</p>*}

<br/>
{include file="../demands/detail.tpl" demand_id=$demand_data.id cat_id=$demand_data.cat_id}
