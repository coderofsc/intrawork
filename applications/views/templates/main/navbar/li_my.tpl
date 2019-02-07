<li class="dropdown">
    <a href="demands/?cnd[mu_eid]={$cuser_data.eid}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}{if $cat_id}&{$cat_id|http_build_query:"cnd[cat_id]"}{/if}" class="dropdown-toggle" data-toggle="dropdown">{L::navbar_my} <span class="badge badge-danger" data-counter="my_dd_criticality_{m_demands::CRITICALITY_EXPR}"></span> <span class="badge badge-warning" data-counter="my_dd_criticality_{m_demands::CRITICALITY_HI}"></span><b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="demands/?cnd[eu_eid]={$cuser_data.eid}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}">
                <span class="pull-left">{L::navbar_my_dd_executor}</span>
                <span data-counter="my_dd_executor" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li><a href="demands/?cnd[cu_eid]={$cuser_data.eid}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}">
                <span class="pull-left">{L::navbar_my_dd_customer}</span>
                <span data-counter="my_dd_customer" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li><a href="demands/?cnd[ru_eid]={$cuser_data.eid}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}">
                <span class="pull-left">{L::navbar_my_dd_responsible}</span>
                <span data-counter="my_dd_responsible" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li><a href="demands/?cnd[mu_eid]={$cuser_data.eid}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}">
                <span class="pull-left">{L::navbar_my_dd_member}</span>
                <span data-counter="my_dd_member" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>

        <li class="divider"></li>
        {foreach from=m_demands::$ar_criticality key=criticality_id item=criticality}
            <li class="add-action">
                <a href="demands/?cnd[mu_eid]={$cuser_data.eid}&cnd[criticality][]={$criticality_id}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}">
                    <span class="pull-left">{$criticality.name}</span>
                    <span data-counter="my_dd_criticality_{$criticality_id}" class="badge badge-{if $criticality_id==m_demands::CRITICALITY_EXPR}danger{elseif $criticality_id==m_demands::CRITICALITY_HI}warning{else}white{/if} pull-right text-right"></span>
                    <div class="clearfix"></div>
                </a>
                <a href="demands/create/?demand_data[criticality]={$criticality_id}"><i class="fa fa-plus"></i></a>
            </li>
        {/foreach}

        {*<li><a href="demands/?cnd[favorite]=true">Избранные заявки</a></li>*}
        <li class="divider"></li>
        <li class="add-action">
            <a href="notes/">Заметки</a>
            <a data-toggle="modal" href="#modal-note"><i class="fa fa-plus"></i></a>
        </li>
        <li>
            <a href="todo/">
                <span class="pull-left">Сделать (ToDo)</span>
                <span data-counter="my_todo_not_complete" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="favorites/">
                <span class="pull-left">Избранное</span>
                <span data-counter="my_favorites" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>

        {*
        <li class="add-action">
            <a href="contacts/">{cls_modules::$ar_modules[cls_modules::MODULE_CONTACTS].name}</a>
            <a href="contacts/create/"><i class="fa fa-plus"></i></a>
        </li>
        *}
        {* {if cls_modules::MODULE_CONTACTS|access:m_roles::CRUD_R}{/if} *}

    </ul>
</li>
