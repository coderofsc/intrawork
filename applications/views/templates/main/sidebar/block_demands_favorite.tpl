<ul class="sidebar-block">
    <li>
        <a class="row header" href="demands/?cnd[cat_id]={$category_id}">
            <div class="col-sm-9">
                <i class="fa fa-fw fa-star text-white"></i>
                <span class="nav-label">Избранные заявки</span>
            </div>
            <div class="col-sm-2 text-center">
                <span class="badge badge-count">{$cuser_data.ar_filters|@sizeof}</span>
            </div>
            <div class="col-sm-1 text-right">
            </div>
        </a>
    </li>
</ul>
