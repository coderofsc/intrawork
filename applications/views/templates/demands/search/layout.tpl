{include file="main/title.tpl"}

<div class="container-fluid">
<form class="form-horizontal" method="post" action="demands/search/">
	{*<div class="modal-body">*}

    {include file="./general.tpl" filter=true}
    {include file="./dates.tpl"}

    <hr/>

    {include file="./sort.tpl"}



	{*</div>*}
	{*<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Найти заявки</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
	</div>*}

    <div class="form-actions form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="form-inline">
                <div class="form-group">
                    <div class="btn-group">
                        <button type="submit" name="search" class="btn btn-primary">{L::actions_search}<span class="hidden"> и сохранить фильтр</span></button>
                        <button class="btn btn-default btn-filter-save"><i class="fa fa-save"></i></button>
                    </div>
                </div>
                <div class="form-group filter-save-container hidden">
                    <label for="exampleInputEmail2">{L::forms_labels_name}</label>
                    <input type="text" name="filter_name" placeholder="Введите имя фильтра" class="form-control">
                </div>
            </div>
        </div>
    </div>

</form>
</div>


<script>

    $(".btn.btn-filter-save").on("click", function() {
        var $form = $(this).closest(".form-inline");

        if ($(this).hasClass("btn-warning")) {
            $("input[name=filter_name]").val('');
        }

        $form.find("button:submit").find("span").toggleClass("hidden");
        $(this).toggleClass("btn-default btn-warning");
        $form.find(".filter-save-container").toggleClass('hidden');

        return false;
    });
</script>