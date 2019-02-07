<ul class="sidebar-block">

        <li class="{*selected*} open">
            <a class="row header" data-toggle="modal" href="#modal-remote" data-remote="{$controller_name}/search/?{$conditions|http_build_query:"cnd"}{if $sort}&{$sort|http_build_query:"sort"}{/if}">
                <div class="col-sm-9 text-ellipsis">
                    <i class="fa fa-fw fa-search text-white"></i>
                    <span class="nav-label">{L::sidebar_selection_parameters} {$controller_info.module.morph.2}</span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="badge badge-count">{$conditions|@sizeof}</span>
                </div>
                <div class="col-sm-1 btn-toggle">
                    <i class="fa fa-fw fa-caret-down"></i>
                </div>
            </a>

            <ul>
                {foreach from=$conditions_decode item=cnd}
                <li class="row">
                    <div class="col-sm-5 text-ellipsis" title="{$cnd.name}"><span class="nav-label">{$cnd.name}</span></div>
                    <div class="col-sm-6 text-ellipsis">
                        {if is_array($cnd.decode)}
                            {foreach from=$cnd.decode item=value }
                                <span class="nav-label">{$value}</span>
                            {/foreach}
                        {else}
                            <span class="nav-label text-ellipsis">{$cnd.decode}</span>
                        {/if}
                    </div>
                    <a href="{$controller_name}/?{$cnd.remove}" class="col-sm-1 text-right">
                        <i class="fa-fw fa fa-times text-warning"></i>
                    </a>
                </li>
                {/foreach}
                <div class="space space-xs"></div>
                <li class="row">
                    <div class="col-sm-12">
                        <a data-toggle="modal" href="#modal-remote" data-remote="{$controller_name}/search/?{$conditions|http_build_query:"cnd"}{if $sort}&{$sort|http_build_query:"sort"}{/if}"><span class="text-muted">Изменить условия отбора</span></a>
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-12">
                        <a href="{$controller_name}/"><span class="text-warning">Отменить все условия</span></a>
                    </div>
                </li>
            </ul>
        </li>
</ul>