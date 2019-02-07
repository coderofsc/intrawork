<ul class="sidebar-block">

    <li class="{*selected open *} ">
        <a href="#" class="row header" onclick="$(this).find('.btn-toggle').click(); return false;">
            <div class="col-sm-11">
                <i class="fa fa-fw fa-filter text-white"></i>
                <span class="nav-label">Быстрый фильтр</span>
            </div>
            <div class="col-sm-1 btn-toggle">
                <i class="fa fa-fw fa-caret-down"></i>
            </div>
        </a>
        <ul>
            {foreach from=$ar_quick_filters item=qfilter}
            <li class="open">
                <div class="row header">
                    <div class="col-sm-12">
                        <strong class="text-muted">{$qfilter.name}</strong>
                    </div>
                </div>
                <ul>
                    {foreach from=$qfilter.filters item=filter}
                        <li class="row">
                            <a class="row" href="{$filter.link}">
                                <div class="col-sm-9" style="padding-left: 30px">
                                    <span class="nav-label">{$filter.name}</span>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <span class="badge badge-{$filter.type}">{$filter.count}</span>
                                </div>
                                <div class="col-sm-1"></div>
                            </a>
                        </li>
                    {/foreach}
                </ul>
            </li>
            {/foreach}
        </ul>
    </li>

</ul>