{assign var="cnd_cat_id" value=0}
{if isset($ar_demands.conditions.cat_id)}

    {if is_array($ar_demands.conditions.cat_id)}
        {$cat_id = $ar_demands.conditions.cat_id}
    {else}
        {$cat_id = [$ar_demands.conditions.cat_id]}
    {/if}
{/if}

<nav class="navbar navbar-default border-bottom" role="navigation" id="navbar-top">
    <div class="container-fluid ">
        <div class="navbar-header">
            <button onclick="pageLayout.toggle('west');" class="btn btn-default toggle-sidebar"><i class="fa fa-bars"></i> </button>
        </div>

        <div>
            {include file="./form_search.tpl"}

            <ul class="nav navbar-nav">
                {*<li><a href="#">{L::navbar_home}</a></li>*}
                {include file="./li_my.tpl"}
                {include file="./li_demands.tpl"}
                {include file="./li_contacts.tpl"}
                <li><a href="files/">Файлы</a></li>
                {include file="./li_company.tpl"}
                {include file="./li_setup.tpl"}
            </ul>

            <ul class="nav navbar-nav navbar-right">
                {include file="./li_extra.tpl"}
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
