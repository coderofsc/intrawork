{include file="main/title.tpl"}


<div class="container-fluid">
    <form class="form-horizontal" method="post" action="contacts/search/">
	{*<input type="hidden" name="search" value="{$smarty.const.SEARCH_SRC_USERS}" />*}
	{*<div class="modal-body">*}
        <div class="form-group">
            <label for="cnd_legal" class="col-sm-2 control-label">{L::forms_labels_contacts_legal}</label>
            <div class="col-sm-4">
                <select class="form-control selectpicker" id="cnd_legal" name="cnd[legal]">
                    <option value="0"></option>
                    <option {if $cnd.legal == $smarty.const.NATURAL_PERSON}selected=""{/if} value="{$smarty.const.NATURAL_PERSON}">Физическое лицо</option>
                    <option {if $cnd.legal == $smarty.const.LEGAL_PERSON}selected=""{/if} value="{$smarty.const.LEGAL_PERSON}">Юридическое лицо</option>
                </select>
            </div>
            <label for="cnd_type_id" class="col-sm-2 control-label">{L::modules_contacts_types_morph_one|mb_ucfirst}</label>
            <div class="col-sm-4">
                <select name="cnd[type_id]" id="cnd_type_id" class="form-control selectpicker" data-live-search="true">
                    {include file="helpers/forms/options.tpl" empty=true data=$ar_types text="name" value="id" selected=$cnd.type_id}
                </select>
            </div>
        </div>

		<div class="form-group">
			<label for="cnd_fio" class="col-sm-2 control-label">{L::forms_labels_fio}</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="cnd[fio]" id="cnd_fio" value="{$conditions.fio}">
			</div>
            <label for="cnd_company" class="col-sm-2 control-label legal-block {if $cnd.legal == $smarty.const.NATURAL_PERSON}hidden{/if}">{L::forms_labels_contacts_company_name}</label>
            <div class="col-sm-4 legal-block {if $cnd.legal == $smarty.const.NATURAL_PERSON}hidden{/if}">
                <input type="text" class="form-control" name="cnd[company]" id="cnd_fio" value="{$conditions.company}">
            </div>

		</div>
        <div class="form-group">
            <label for="cnd_email" class="col-sm-2 control-label">{L::forms_labels_email}</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="cnd[email]" id="cnd_email" value="{$conditions.email}">
            </div>
            <label for="cnd_phone" class="col-sm-2 control-label">{L::forms_labels_phone}</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="cnd[phone]" id="cnd_phone" value="{$conditions.phone}">
            </div>
        </div>


        <hr/>

        <div class="form-group">
            <label for="cnd_reg_start" class="col-sm-2 control-label">{L::forms_labels_reg_start}</label>
            <div class="col-sm-4">
                <div class="input-group date form_date reg_start_date" data-link-field="cnd_reg_start_lf">
                    <span class="input-group-addon">{L::text_interval_from}</span>
                    <input class="form-control" id="cnd_reg_start" size="16" type="text" value="{$conditions.reg_start|date_format:"%d/%m/%Y"}" readonly required="true">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
                </div>
                <input type="hidden" id="cnd_reg_start_lf" name="cnd[reg_start]" value="{$conditions.reg_start|date_format:"%Y-%m-%d"}" />
            </div>

            <label for="cnd_reg_end" class="col-sm-2 control-label">{L::forms_labels_reg_end}</label>
            <div class="col-sm-4">
                <div class="input-group date form_date reg_end_date" data-link-field="cnd_reg_end_lf">
                    <span class="input-group-addon">{L::text_interval_to}</span>
                    <input class="form-control" id="cnd_reg_end" size="16" type="text" value="{$conditions.reg_end|date_format:"%d/%m/%Y"}" readonly required="true">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
                </div>
                <input type="hidden" id="cnd_reg_end_lf" name="cnd[reg_end]" value="{$conditions.reg_end|date_format:"%Y-%m-%d"}" />
            </div>
        </div>

		<hr/>

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


	{*</div>*}
	{*<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Найти заявки</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
	</div>*}

    <div class="form-actions form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="search" class="btn btn-primary">{L::actions_search}</button>
        </div>
    </div>

</form>
</div>

<script>
    $("#cnd_legal").on("change", function() {
        var selected = $(this).val();

        if (selected == {$smarty.const.NATURAL_PERSON}) {
            $(".legal-block").addClass("hidden");
        } else {
            $(".legal-block").removeClass("hidden");
        }
    });
</script>