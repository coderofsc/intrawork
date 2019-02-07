<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">
    <thead>
    <tr>
        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">{L::forms_labels_property}</th>
        {if $previous}
            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">{L::forms_labels_history_new_value}</th>
            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">{L::forms_labels_history_old_value}</th>
        {else}
            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">{L::forms_labels_history_new_value}</th>
        {/if}
    </tr>
    </thead>
    <tbody>
    {foreach from=$data_decode item=record key=index}
        {if $record.decode || ($previous && $record.decode != $previous_data_decode.$index.decode)}
        <tr>
            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">{$record.name}</td>
            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">{$record.decode|default:"<span style='color: #cfcfcf'>&mdash;</span>"}</td>
            {if $previous}
                <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">{$previous_data_decode.$index.decode|default:"<span style='color: #cfcfcf'>&mdash;</span>"}</td>
            {/if}
        </tr>
        {/if}
    {/foreach}
    </tbody>
</table>
