{assign var="layout_name" value=$controller_info.module.alias|replace:"/":"-"}
{assign var="layout_path" value=$controller_info.module.alias}

<div class="ui-layout-center {*animated fadeInDown*}">
    {include file="main/title.tpl"}
    {include file="./search.tpl"}
    {include file="./list.tpl"}
</div>
{*
{if $controller_info.pane}
    <div class="ui-layout-center jscroll">
        {include file="main/title.tpl"}
        {include file="./list.tpl"}
    </div>
{else}
    {include file="main/title.tpl"}
    {include file="./list.tpl"}
{/if}

*}