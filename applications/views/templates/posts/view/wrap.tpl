{$post_data.descr}

<div class="h3">{L::modules_users_name}</div>
{include file="users/list.tpl" ar_users=$ar_users module_id=cls_modules::MODULE_USERS denied_delete=true}
