<ul class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab">{L::tabs_general}</a></li>
    <li><a href="#extra" data-toggle="tab">{L::tabs_extra}</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane clamped active" id="general">
        {include file="users/view/block_general.tpl"}
    </div>
    <div class="tab-pane clamped" id="extra">
        {include file="users/view/block_extra.tpl"}
    </div>

</div>

