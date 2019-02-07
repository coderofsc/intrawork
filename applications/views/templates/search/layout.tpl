{include file="main/title.tpl"}

<style>
    span.ss {
        background-color: lightyellow;
        color: #333;
    }

    h4 a span.ss {
        color: inherit;
    }

    table.table-search tbody tr td {
        border:0;
        border-bottom: 1px dashed #e7eaec;
    }
</style>
<div class="container-fluid">

    <h3 class="clamped-margin-top">
        {L::modules_search_text_search_result}{if $search_data.text} : &laquo;{$search_data.text}&raquo;{/if}
    </h3>
    <small>{L::modules_search_text_query_time} ({$search_data.time|round:3} {$search_data.time|round|declension:(L::dates_sec_morph_one|cat:";"|cat:L::dates_sec_morph_two|cat:";"|cat:L::dates_sec_morph_five)})</small>

    <div class="search-form">
        <form action="search/" method="get">
            <div class="input-group">
                <input value="{$search_data.text}" name="text" class="form-control input-lg" type="text" />
                <div class="input-group-btn">
                    <button class="btn btn-lg btn-primary" type="submit">
                        {L::actions_search}
                    </button>
                </div>
            </div>
            <div class="checkbox {*i-checks*}">
                <label>
                    <input type="checkbox" {if in_array($smarty.const.OWNER_USER, $search_data.sources)}checked{/if} name="sources[]" value="{$smarty.const.OWNER_USER}"> {L::modules_users_name}
                </label>
                <label>
                    <input type="checkbox" {if in_array($smarty.const.OWNER_CONTACT, $search_data.sources)}checked{/if} name="sources[]" value="{$smarty.const.OWNER_CONTACT}"> {L::modules_contacts_name}
                </label>
                <label>
                    <input type="checkbox" {if in_array($smarty.const.OWNER_DEMAND, $search_data.sources)}checked{/if} name="sources[]" value="{$smarty.const.OWNER_DEMAND}"> {L::modules_demands_name}
                </label>
                <label>
                    <input type="checkbox" {if in_array($smarty.const.OWNER_NEWS, $search_data.sources)}checked{/if} name="sources[]" value="{$smarty.const.OWNER_NEWS}"> {L::modules_news_name}
                </label>
            </div>

        </form>
    </div>

    <div class="space"></div>

    {if $search_data.result}
    {include file="search/list.tpl"}
    {else}
        <div class="alert alert-default">{L::text_nothing_found}</div>
    {/if}

</div>



