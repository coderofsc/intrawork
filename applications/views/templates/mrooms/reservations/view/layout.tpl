{include file="main/title.tpl"}

<div class="container-fluid">

    <form class="form-horizontal" role="form" method="post">

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-4 control-label">{L::modules_mrooms_morph_one|mb_ucfirst}</label>
            <div class="col-sm-10 col-xs-8">
                <p class="form-control-static">
                    {$mrr_data.name}
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mroomsres_status}</label>
            <div class="col-sm-10 col-xs-8">
                <p class="form-control-static">
                    <i class="fa fa-{if $mrr_data.unix_end<$smarty.now}unlock text-info{else}lock text-danger{/if}"></i>
                    {if $mrr_data.unix_end<$smarty.now}Свободно{else}Занято{/if}
                </p>
            </div>
        </div>

        {if $mrr_data.unix_end>$smarty.now}

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mroomsres_remain}</label>
            <div class="col-sm-10 col-xs-8">
                <p class="form-control-static">
                    {$mrr_data.unix_end|remaining_time}
                </p>
            </div>
        </div>
        {/if}

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mroomsres_start}</label>
            <div class="col-sm-10 col-xs-8">
                <p class="form-control-static">
                    <i class="fa fa-clock-o"></i> {$mrr_data.unix_start|ts2text}
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mroomsres_end}</label>
            <div class="col-sm-10 col-xs-8">
                <p class="form-control-static">
                    <i class="fa fa-clock-o"></i> {$mrr_data.unix_end|ts2text}
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-4 control-label">{L::forms_labels_mroomsres_face_reserved}</label>
            <div class="col-sm-10 col-xs-8">
                <p class="form-control-static">
                    {include file="helpers/avatar.tpl" hash=$mrr_data.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
                    {$mrr_data.user_fio}
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-4 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10 col-xs-8">
                <p class="form-control-static">{if $mrr_data.descr}{$mrr_data.descr}{else}<span class="text-muted">{L::text_not_specified}</span>{/if}</p>
            </div>
        </div>


    </form>


</div>