{include file="main/title.tpl"}
<div class="container-fluid">
    {if $record_limit}
        <div class="alert alert-danger">
            <h4>Достигнут лимит пользователей</h4>
            <p>Установлено максимальное количество пользователей: {$config->limit->users_limit}</p>
        </div>
    {else}
        <form class="form-horizontal form-valid form-control-changes" autocomplete="off" role="form" method="post">

            <ul class="nav nav-tabs" id="user-form-tabs">
                <li class="active"><a href="#general" data-toggle="tab">{L::tabs_general}</a></li>
                <li><a href="#contacts" data-toggle="tab">{L::tabs_contacts}</a></li>
                <li><a href="#notification" data-toggle="tab">{L::tabs_notification}</a></li>
                <li><a href="#extra" data-toggle="tab">{L::tabs_extra}</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    {include file="users/form/block_general.tpl"}
                </div>
                <div class="tab-pane" id="contacts">
                    {include file="users/form/block_contacts.tpl"}
                </div>
                <div class="tab-pane" id="notification">
                    {include file="users/form/block_notification.tpl"}
                </div>
                <div class="tab-pane" id="extra">
                    {include file="users/form/block_extra.tpl"}
                </div>
            </div>

            {include file="helpers/forms/actions.tpl" update=isset($user_data.id)}
        </form>
    {/if}
</div>