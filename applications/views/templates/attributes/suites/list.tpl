<table id="attribute-suite-table" class="table table-hover">
	{foreach from=$ar_guides item=suite key=suite_id}
		<tr data-id="{$suite_id}">
			<td>
				{$suite_id}
			</td>
			<td>
				{$suite.name}
			</td>
			<td>
				<small class="grey">{if $suite.suite}{$suite.suite_name}{else}Должность не указана{/if}</small>
			</td>
		</tr>
    {foreachelse}
        <tr>
            <td colspan="10">
                <div class="alert alert-default">Нет наборов</div>
            </td>
        </tr>
	{/foreach}
</table>