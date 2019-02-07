<div class="form-horizontal {*form-clamped*} {*well well-sm*}">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group clamped-margin-bottom">
                {*Тип*}
                <label class="col-sm-2 col-xs-3 control-label">Тип</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">
                        {if $demand_data.type_name}<label class="label label-{$demand_data.type_type}">{$demand_data.type_name}</label>{else}<span class="label label-disable">{L::text_unknown|mb_ucfirst}</span>{/if}
                        <span class="hidden-xs">
                        {include file="helpers/forms/demand_status.tpl" value=$demand_data.status read=true}
                        </span>
                    </p>
                </div>
                {*Статус*}
                <div class="visible-xs">
                <label class="col-sm-2 col-xs-3 control-label">{L::forms_labels_demands_status}</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">{include file="helpers/forms/demand_status.tpl" value=$demand_data.status read=true}</p>
                </div>
                </div>
                {*Приоритет*}
                <label class="col-sm-2 col-xs-3 control-label">{L::forms_labels_demands_priority}</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">{include file="helpers/forms/demand_priority.tpl" value=$demand_data.priority read=true}</p>
                </div>
                {*Критичвность*}
                <label class="col-sm-2 col-xs-3 control-label">{L::forms_labels_demands_criticality}</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">{include file="helpers/forms/demand_criticality.tpl" value=$demand_data.criticality read=true}</p>
                </div>

                {*Была в работе*}
                <label class="col-sm-2 col-xs-3 control-label">{L::forms_labels_demands_time_in_work}<span class="hidden-sm hidden-xs"></span></label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        {$demand_data.exec_time|ts2hours}
                    </p>
                </div>


                {*Требуется времени*}
                <label class="col-sm-2 col-xs-3 control-label">{L::forms_labels_demands_required_time}<span class="hidden-sm hidden-xs"></span></label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">
                        {if $demand_data.required_time}
                            {$demand_data.required_time|ts2hours}
                        {else}
                            <span class="text-muted">{L::text_not_specified}</span>
                        {/if}
                    </p>
                </div>

                <div class="clearfix visible-xs"></div>

                <label class="col-sm-2 col-xs-3 control-label">{L::forms_labels_demands_implement_percent}</label>
                <div class="col-sm-2 col-xs-3">
                    <div class="form-control-static">
                        <div class="progress progress-striped {if $demand_data.status == m_demands::STATUS_WORK}active{/if} clamped">
                            {if $demand_data.percent_complete <=100}
                                <div class="progress-bar progress-bar-success" aria-valuenow="{$demand_data.percent_complete}" style="width: {$demand_data.percent_complete}%">
                                    {$demand_data.percent_complete}%
                                </div>
                            {else}
                                <div class="progress-bar progress-bar-success" aria-valuenow="{$demand_data.percent_complete}" style="width: {ceil(100/{$demand_data.percent_complete}*100)}%">
                                    100%
                                </div>

                                <div class="progress-bar progress-bar-danger" aria-valuenow="{$demand_data.percent_complete}" style="width: {(100-ceil(100/{$demand_data.percent_complete}*100))}%">
                                    {$demand_data.percent_complete_over}%
                                </div>
                            {/if}
                        </div>
                        
                    </div>
                </div>


                {*Выполнено*}
                {*
                {if $demand_data.required_time}
                    <label class="col-sm-2 col-xs-3 control-label">{L::forms_labels_demands_implement_percent}</label>
                    <div class="col-sm-2 col-xs-3">
                        <div class="form-control-static">

                            {assign var="percent_exec" value=0}
                            {assign var="percent_exec_over" value=0}

                            {if $demand_data.required_time}
                                {assign var="percent_exec" value=ceil($demand_data.exec_time/$demand_data.required_time*100)}

                                {if $demand_data.required_time < $demand_data.exec_time}
                                    {assign var="percent_exec_over" value=ceil(($demand_data.exec_time-$demand_data.required_time)/$demand_data.required_time*100)}
                                {/if}
                            {/if}

                            <div class="progress progress-striped {if $demand_data.status == m_demands::STATUS_WORK}active{/if} clamped">
                                {if $percent_exec <=100}
                                    <div class="progress-bar progress-bar-success" aria-valuenow="{$percent_exec}" style="width: {$percent_exec}%">
                                        {$percent_exec}%
                                    </div>
                                {else}
                                    <div class="progress-bar progress-bar-success" aria-valuenow="{$percent_exec}" style="width: {ceil(100/{$percent_exec}*100)}%">
                                        100%
                                    </div>

                                    <div class="progress-bar progress-bar-danger" aria-valuenow="{$percent_exec}" style="width: {(100-ceil(100/{$percent_exec}*100))}%">
                                        {$percent_exec_over}%
                                    </div>
                                {/if}
                            </div>
                        </div>
                    </div>
                {/if}
                *}
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="form-horizontal {*form-clamped*} {*well well-sm*}">
    {*<div class="space demand-details {if !$detail}hidden{/if}"></div>*}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group demand-details {if !$detail}hidden{/if}">
                {*Заказчик*}
                <label class="col-sm-2 col-xs-3 control-label {if $demand_data.active_role == $smarty.const.USER_ROLE_CUSTOMER}text-bold{/if}">{L::members_customer}</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        {if $demand_data.cu_id}
                            <a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$demand_data.cu_id}/">
                                {$demand_data.cu_fi}
                            </a>
                        {else}
                            {$demand_data.cu_email}
                        {/if}
                    </p>
                </div>
                {*Исполнитель*}
                <label class="col-sm-2 col-xs-3 control-label {if $demand_data.active_role == $smarty.const.USER_ROLE_EXECUTOR}text-bold{/if}">{L::members_executor}</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        {if $demand_data.eu_id}
                            <a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$demand_data.eu_id}/">
                                {$demand_data.eu_fi}
                            </a>
                        {else}
                            <span class="text-muted">{L::text_unknown|mb_ucfirst}</span>
                        {/if}
                    </p>
                </div>

                <div class="clearfix visible-xs"></div>

                {*Ответственный*}
                <label class="col-sm-2 col-xs-3 control-label {if $demand_data.active_role == $smarty.const.USER_ROLE_RESPONSIBLE}text-bold{/if}">{L::members_responsible}</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        {if $demand_data.ru_id}
                            <a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$demand_data.ru_id}/">
                                {$demand_data.ru_fi}
                            </a>
                        {else}
                            <span class="text-muted">{L::text_unknown|mb_ucfirst}</span>
                        {/if}
                    </p>
                </div>
                {*Контакт*}
                <label class="col-sm-2 col-xs-3 control-label">{L::modules_contacts_morph_one|mb_ucfirst}</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        {if $demand_data.contact_id}
                            <a data-toggle="modal" href="#modal-remote" data-remote="contacts/view/{$demand_data.contact_id}/">
                                {if $demand_data.contact_legal ==$smarty.const.NATURAL_PERSON}
                                    {$demand_data.contact_face_short_fio}
                                {else}
                                    {$demand_data.contact_company_full_name}
                                {/if}
                            </a>
                        {else}
                            <span class="text-muted">{L::text_unknown|mb_ucfirst}</span>
                        {/if}
                    </p>
                </div>

                <div class="clearfix visible-xs"></div>

                {*Дедлайн*}
                {if $demand_data.unix_deadline_date}
                    <label class="col-sm-2 col-xs-3 control-label">Дедлай</label>
                    <div class="col-sm-2 col-xs-3">
                        <p class="form-control-static">
                            {if $demand_data.unix_deadline_date<$smarty.now}<i class="fa fa-warning text-warning"></i> {/if} {$demand_data.unix_deadline_date|ts2text:false:false:false}
                        </p>
                    </div>
                {/if}

                {*Стоимость*}
                {*{if $demand_data.exec_price}*}
                <label class="col-sm-2 col-xs-3 control-label">Стоимость<span class="hidden-sm hidden-xs"></span></label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static">
                        {if $demand_data.exec_price}
                            {$demand_data.exec_price|number_format:1}
                        {else}
                            <span class="text-muted">&mdash;</span>
                        {/if}
                    </p>
                </div>
                {*{/if}*}

                {*Проект*}
                <label class="col-sm-2 col-xs-3 control-label">{L::modules_projects_morph_one|mb_ucfirst}</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        {if $demand_data.project_id}
                            <a href="demands/?cnd[project_id]={$demand_data.project_id}">{$demand_data.project_name}</a>
                        {else}
                            <span class="text-muted">{L::text_unknown|mb_ucfirst}</span>
                        {/if}
                    </p>
                </div>

                {*Версия проекта*}
                <label class="col-sm-2 col-xs-3 control-label">Версия</label>
                <div class="col-sm-2 col-xs-3">
                    <p class="form-control-static text-ellipsis">
                        {if $demand_data.ar_versions}
                            {foreach from=$demand_data.ar_versions item=version}
                                <a href="demands/?cnd[project_id]={$demand_data.project_id}&cnd[version_id]={$version.id}">{$version.name}</a>{if !$version@last},{/if}
                            {/foreach}
                        {else}
                            <span class="text-muted">{L::text_unknown|mb_ucfirst}</span>
                        {/if}
                    </p>
                </div>

            </div>
        </div>
    </div>

    {if !$detail}
    <div class="row {*visible-xs*}">
        <div class="col-sm-12 text-center">
            <button class="btn btn-link btn-sm" onclick="$(this).closest('.form-horizontal').find('.demand-details').toggleClass('hidden'); $(this).closest('.row').remove(); return false;">Показать детали</button>
        </div>
    </div>
    {/if}



</div>