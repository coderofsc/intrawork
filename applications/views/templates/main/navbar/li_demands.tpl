<li class="dropdown">
    <a href="demands/" class="dropdown-toggle" data-toggle="dropdown">{L::navbar_demands} <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li>
            <a href="demands/?cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}{if $cat_id}&{$cat_id|http_build_query:"cnd[cat_id]"}{/if}" >
                <span class="pull-left">Активные заявки</span>
                <span data-counter="dd_actual" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="divider"></li>

        {if cls_modules::MODULE_DEMANDS|access:m_roles::CRUD_C}
            <li><a href="demands/create/">{L::actions_create}</a></li>
            <li class="divider"></li>
        {/if}

        {foreach from=$global_ar_demands_types item=type key=type_id}
            <li {if cls_modules::MODULE_DEMANDS|access:m_roles::CRUD_C}class="add-action"{/if}>
                <a href="demands/?cnd[type_id]={$type_id}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}{if $cat_id}&{$cat_id|http_build_query:"cnd[cat_id]"}{/if}" >
                    <span class="text-ellipsis pull-left">{$type.name}</span>
                    <span data-counter="dd_type_{$type_id}" class="badge badge-white pull-right text-right"></span>
                    <div class="clearfix"></div>
                </a>
                {if cls_modules::MODULE_DEMANDS|access:m_roles::CRUD_C}
                    <a href="demands/create/?demand_data[type_id]={$type_id}"><i class="fa fa-plus"></i></a>
                {/if}
            </li>
        {/foreach}
        {if $global_ar_demands_types}
            <li class="divider"></li>
        {/if}

        {if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_R}
            <li{if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_C} class="add-action"{/if}>
                <a href="projects/">{cls_modules::$ar_modules[cls_modules::MODULE_PROJECTS].name}</a>
                {if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_C}<a href="projects/create/"><i class="fa fa-plus"></i></a>{/if}
            </li>
            <li class="divider"></li>
        {/if}



        <li><a data-toggle="modal" href="#modal-remote" data-remote="demands/search/">{L::navbar_demands_dd_extsearch}</a></li>
        <li><a href="categories/">{cls_modules::$ar_modules[cls_modules::MODULE_CATEGORIES].name}</a></li>
        {*<li><a href="demands/?cnd[contact_id]=*">{L::navbar_demands_dd_contactdemands}</a></li>*}
        {*
        <li class="divider"></li>
        {foreach from=m_demands::$ar_status key=status_id item=status}
            <li style="width:50%;float: left; {if $status@index is even}border-right:1px solid #e5e5e5;{/if}">
                <a href="demands/?cnd[status]={$status_id}{if $cat_id}&{$cat_id|http_build_query:"cnd[cat_id]"}{/if}" >
                    <span class="pull-left">{$status.name}</span>
                    <div class="clearfix"></div>
                </a>
            </li>
        {/foreach}*}

    </ul>
</li>
