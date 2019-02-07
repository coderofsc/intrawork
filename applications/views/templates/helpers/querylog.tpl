<table class="table">
	<colgroup>
		<col width="80%" />
		<col width="*" />
	</colgroup>

    <thead>
        <th>Запрос</th>
        <th>Время</th>
        <th>Результат</th>
    </thead>

    <tbody>
	{foreach from=$ar_query item=item key=hash}
		<tr {if $ar_query_time.$hash > 1 || !$item.result}class="danger"{elseif $ar_query_time.$hash > 0.5}class="warning"{/if}>
			<td>
				{$item.query|trim|truncate}
				<a href="#" onclick="$(this).parent().find('.formated').slideToggle(); return false;">Форматировать</a> <a href="#" onclick="$(this).parent().find('.trace').slideToggle(); return false;">Трейс</a>

				<div style="display: none" class="formated">
					<b>Запрос</b>
                    {SqlFormatter::format($item.query)}
				</div>

				<div style="display: none" class="trace">
					<b>Трассировка</b>
					<ol style="margin: auto;">
						{foreach from=$item.trace item=trace_item}
							<li>{$trace_item.file} ({$trace_item.line}): функция/метод "{$trace_item.function}" класс "{$trace_item.class}"</li>
						{/foreach}
					</ol>
				</div>

			</td>
			<td>
				{$ar_query_time.$hash|round:3}
			</td>
			<td>
				{if $item.result}<i class="fa fa-check"></i>{else}<i class="text-danger fa fa-times"></i>{/if}
			</td>
		</tr>
	{/foreach}
    </tbody>
</table>