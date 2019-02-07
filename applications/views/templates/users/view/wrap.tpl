<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-sm-4 col-xs-12 text-center">
                {include file="users/view/block_avatar.tpl"}
                <div class="clearfix"></div>
                <div class="space"></div>
            </div>
            <div class="col-lg-12 col-sm-8 col-xs-12">
                {include file="users/view/block_about.tpl"}
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

        <div class="h3">Все заявки пользователя</div>
        {include file="./block_chart.tpl"}

        <div class="h3">
            Учавствует в заявках
            {if $ar_demands_member.total}
                <a title="Только исполнение" href="demands/{if $ar_demands_executor.conditions}?{$ar_demands_executor.conditions|http_build_query:"cnd"}{/if}" class="pull-right"><span class="badge badge-warning"><i class="fa fa-cog fa-spin"></i> {$ar_demands_executor.total}</span></a>
                <a title="Все заявки с участием пользователя" href="demands/{if $ar_demands_member.conditions}?{$ar_demands_member.conditions|http_build_query:"cnd"}{/if}" class="pull-right right-space"><span class="badge badge-info">{$ar_demands_member.total}</span></a>
            {/if}
        </div>
        {include file="demands/list.tpl" collapsed=true ar_demands=$ar_demands_member module_id=cls_modules::MODULE_DEMANDS show_all=false denied_delete=true}
        {*{if $ar_demands_member.total}
        <ul class="pager">
            <li><a href="demands/?cnd[mu_eid]={$user_data.eid}">Показать все заявки</a></li>
        </ul>
        {/if}*}


        {if cls_modules::MODULE_ROLES|access:m_roles::CRUD_R || $cuser_data.id == $user_data.id}
            <div class="h3">Доступ</div>
            {include file="users/view/block_access.tpl"}
        {/if}
    </div>
</div>
