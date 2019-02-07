<div class="form-group">
    <label for="sort_by" class="col-sm-2 control-label">{L::sort_name}</label>
    <div class="col-sm-4">
        <select class="form-control selectpicker" id="sort_by" name="sort[by]">
            <option value="0"></option>
            {foreach from=$ar_sort item=sort_item key=by}
                <option {if $sort.by == $by}selected=""{/if} value="{$by}">{$sort_item.name}</option>
            {/foreach}
        </select>
    </div>

    <label for="sort_dir" class="col-sm-2 control-label">{L::sort_dir}</label>
    <div class="col-sm-4">
        <select class="form-control selectpicker" id="sort_dir" name="sort[dir]">
            <option value="0"></option>
            <option {if $sort.dir == $smarty.const.SORT_ASC_AZ}selected=""{/if} value="{$smarty.const.SORT_ASC_AZ}"><i class="fa fa-sort-amount-asc"></i> {L::sort_asc}</option>
            <option {if $sort.dir == $smarty.const.SORT_DSC_ZA}selected=""{/if} value="{$smarty.const.SORT_DSC_ZA}"><i class="fa fa-sort-amount-desc"></i> {L::sort_desc}</option>
        </select>
    </div>
</div>