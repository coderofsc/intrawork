{include file="main/title.tpl"}

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<img class="img-thumbnail img-responsive" src="http://demo.intrawork.ru/images/photos/demo/photo_5_medium.jpg?77947829" />
		</div>
		<div class="col-md-8">
			{include file="users/view/block_about.tpl"}
		</div>
	</div>

	<div class="h3">Последние заявки</div>
	{include file="demands/list.tpl"}
	<div class="h3">Нагрузка</div>
	{include file="demands/list.tpl"}
</div>
