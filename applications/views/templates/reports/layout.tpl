{assign var="layout_name" value=$controller_info.module.alias|replace:"/":"-"}
{assign var="layout_path" value=$controller_info.module.alias}

{if $controller_info.pane}
    <div class="ui-layout-center jscroll {*animated fadeInDown*}">
        {include file="main/title.tpl"}

        {*
        <div class="container-fluid">
            <form class="form-inline" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail2">Период</label>
                    <div class="input-group">
                        <span class="input-group-addon">от</span>
                        <input type="text" class="form-control" placeholder="Username">
                        <span class="input-group-addon">до</span>
                        <input type="text" class="form-control" placeholder="Username">

                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Показать</button>
            </form>
        </div>
        <div class="space"></div>
        *}

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




{*

{include file="main/title.tpl"}

<div class="container-fluid">

    {include file="./list.tpl"}

</div>*}