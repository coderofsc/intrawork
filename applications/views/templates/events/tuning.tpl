{include file="main/title.tpl"}

<div class="container-fluid">
    <form class="form-horizontal" method="post" action="events/tuning/">
        <div class="form-group">
            <label for="cnd_user_id" class="col-sm-2 control-label">{L::modules_users_morph_one|mb_ucfirst}</label>
            <div class="col-sm-4">
                <select class="form-control selectpicker" data-align-right="true" multiple name="cnd[user_id][]" id="cnd_user_id" data-selected-text-format="count" data-live-search="true">
                    {*{include file="helpers/forms/options.tpl" data=$ar_users text="fi" value="id" selected=$conditions.user_id}*}
                    {include file="helpers/forms/options.tpl" empty=true data=$ar_users text="fio" value="eid" selected=$conditions.user_id group="dprt_name"}
                </select>
            </div>

            <label for="cnd_post_id" class="col-sm-2 control-label">{L::modules_posts_morph_one|mb_ucfirst}</label>
            <div class="col-sm-4">
                <select class="form-control selectpicker" data-align-right="true" multiple name="cnd[post_id][]" id="cnd_post_id" data-selected-text-format="count" data-live-search="true">
                    {include file="helpers/forms/options.tpl" data=$ar_posts text="name" value="id" selected=$conditions.post_id}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="cnd_dprt_id" class="col-sm-2 control-label">{L::modules_departments_morph_one|mb_ucfirst}</label>
            <div class="col-sm-4">
                <select class="form-control selectpicker" multiple name="cnd[dprt_id][]" id="cnd_dprt_id" data-selected-text-format="count" data-live-search="true">
                    {include file="helpers/abstracts/tree_options.tpl" tree=$ar_tree_departments selected=$conditions.dprt_id}
                </select>
            </div>

            <label for="cnd_role_id" class="col-sm-2 control-label">{L::modules_roles_morph_one|mb_ucfirst}</label>
            <div class="col-sm-4">
                <select class="form-control selectpicker" multiple name="cnd[role_id][]" id="cnd_role_id" data-selected-text-format="count" data-live-search="true">
                    {include file="helpers/forms/options.tpl" data=$ar_roles text="name" value="id" selected=$conditions.role_id}
                </select>
            </div>
        </div>

        <hr/>

        <div class="form-group">
            <label for="cnd_type_id" class="col-sm-2 control-label">{L::forms_labels_events_type_object}</label>
            <div class="col-sm-4">
                <select class="form-control selectpicker" multiple name="cnd[type_id][]" id="cnd_type_id" data-selected-text-format="count" data-live-search="true">
                    {include file="helpers/forms/options.tpl" data=cls_modules::$ar_modules text="name" value_src="key" selected=$conditions.type_id}
                </select>
            </div>

            <label for="cnd_text" class="col-sm-2 control-label">{L::forms_labels_events_text}</label>
            <div class="col-sm-4">
                <input type="text" id="cnd_text" class="form-control" name="cnd[text]" value="{$conditions.text}">
            </div>
        </div>

        <hr/>


        <div class="form-group">
            <label for="cnd_period_start" class="col-sm-2 control-label">{L::forms_labels_date_start}</label>
            <div class="col-sm-4">
                <div class="input-group date form_date period_start_date" data-link-field="cnd_period_start_lf">
                    <span class="input-group-addon">От</span>
                    <input class="form-control" id="cnd_period_start" size="16" type="text" value="{$conditions.period_start|date_format:"%d/%m/%Y"}" readonly required="true">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
                </div>
                <input type="hidden" id="cnd_period_start_lf" name="cnd[period_start]" value="{$conditions.period_start|date_format:"%Y-%m-%d"}" />
            </div>

            <label for="cnd_period_end" class="col-sm-2 control-label">{L::forms_labels_date_end}</label>
            <div class="col-sm-4">
                <div class="input-group date form_date period_end_date" data-link-field="cnd_period_end_lf">
                    <span class="input-group-addon">До</span>
                    <input class="form-control" id="cnd_period_end" size="16" type="text" value="{$conditions.period_end|date_format:"%d/%m/%Y"}" readonly required="true">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
                </div>
                <input type="hidden" id="cnd_period_end_lf" name="cnd[period_end]" value="{$conditions.period_end|date_format:"%Y-%m-%d"}" />
            </div>
        </div>

        <hr/>

        <div class="form-group">
            <label for="sort_by" class="col-sm-2 control-label">{L::sort_name}</label>
            <div class="col-sm-4">
                <select class="form-control selectpicker" id="sort_by" name="sort[by]">
                    <option value="0"></option>
                    {foreach from=$ar_sort item=sort_item key=by}
                        <option {if $sort.by == $by}selected=""{/if} value="{$by}">{$sort_item.name}</option>
                    {/foreach}
                </select>
            </div>

            <label for="sort_dir" class="col-sm-2 control-label">{L::sort_dir}</label>
            <div class="col-sm-4">
                <select class="form-control selectpicker" id="sort_dir" name="sort[dir]">
                    <option value="0"></option>
                    <option {if $sort.dir == $smarty.const.SORT_ASC_AZ}selected=""{/if} value="{$smarty.const.SORT_ASC_AZ}"><i class="fa fa-sort-amount-asc"></i> {L::sort_asc}</option>
                    <option {if $sort.dir == $smarty.const.SORT_DSC_ZA}selected=""{/if} value="{$smarty.const.SORT_DSC_ZA}"><i class="fa fa-sort-amount-desc"></i> {L::sort_desc}</option>
                </select>
            </div>
        </div>


        {*</div>*}
        {*<div class="modal-footer">
            <button type="submit" class="btn btn-primary">Найти заявки</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>*}

        <div class="form-actions form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="search" class="btn btn-primary">{L::actions_search}</button>
            </div>
        </div>

    </form>
</div>