{include file="main/title.tpl"}

<div class="container-fluid">

    <form class="form-horizontal" role="form">

        <div class="form-group form-group-general">
            <label for="inputEmail3" class="col-sm-2 control-label">Название</label>
            <div class="col-sm-4">
                <input type="email" class="form-control" name="user_data[lastname]" id="user_data_lastname" id="user_data_lastname">
            </div>
        </div>

		<div class="form-group">
			<label for="inputEmail333" class="col-sm-2 control-label">Наборный класс</label>
			<div class="col-sm-5">
				<input type="checkbox" class="i-checks" id="inputEmail333" name="tender_data[pay_method][]" value="{$item.bit}" />
			</div>
		</div>

		<legend>Список атрибутов набора</legend>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Атрибуты набора</label>
            <div class="col-sm-6">
                {include file="attributes/suites/form/attributes_table.tpl"}
            </div>
        </div>

        {include file="helpers/forms/actions.tpl"}

    </form>
</div>



