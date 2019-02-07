<ul class="sidebar-block">
        <li>
            <a href="#" class="row header" onclick="$(this).find('.btn-toggle').click(); return false;">
                <div class="col-sm-9">
                    <i class="fa fa-fw fa-filter text-white"></i>
                    <span class="nav-label">{L::sidebar_save_filters}</span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="badge badge-count">{$cuser_data.ar_filters|@sizeof}</span>
                </div>
                <div class="col-sm-1 btn-toggle">
                    <i class="fa fa-fw fa-caret-down"></i>
                </div>
            </a>

            <ul>
                {foreach from=$cuser_data.ar_filters key=filter_id item=filter}
                    <li class="row">
                        <a class="col-sm-11" href="demands/?{$filter.conditions|http_build_query:"cnd"}{if $filter.sort}&{$filter.sort|http_build_query:"sort"}{/if}">
                            <span class="nav-label">{$filter.name}</span>
                        </a>
                        <a href="demands/search/{$filter.id}/delete/" class="col-sm-1 text-right delete">
                           <i class="fa-fw fa fa-times text-danger"></i>
                        </a>
                    </li>
                {/foreach}
            </ul>
        </li>
</ul>

<script>

</script>