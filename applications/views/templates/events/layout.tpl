{assign var="layout_name" value=$controller_info.module.alias|replace:"/":"-"}
{assign var="layout_path" value=$controller_info.module.alias}

{if $controller_info.pane}
    <div class="ui-layout-center jscroll {*animated fadeInDown*}">
        {include file="main/title.tpl"}
        {include file="./list.tpl"}
    </div>

{else}
    {include file="main/title.tpl"}
    {include file="./list.tpl"}
{/if}

<script>
    {block name="script"}
    {/block}

    $("#{$layout_name}-table").closest(".jscroll").on("jscroll-after-append", function(event, args) {
        {block name="after_append"}
        {/block}
    });
</script>


