<div class="modal inmodal" id="modal-loadlog" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg ui-layout-lg ui-layout-md ui-layout-sm ui-layout-xs">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="place-modal-formLabel">Отчет по загрузке страницы</h4>
                <small class="text-muted">Общее время выполнения {$exec_time|round:3}с. из них {$exec_query_time|round:3}с. нагрузка БД и {$exec_php_time|round:3} выполнения скрипта PHP</small>
			</div>
			<div class="modal-body">
                {include file="helpers/querylog.tpl"}
			</div>
		</div>
	</div>
</div>
