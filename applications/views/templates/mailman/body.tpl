<tr>
    <td valign="top">
        <!-- message body !-->
        {if $letter_data.answer}
            {include file="./answer_divider.tpl"}
        {/if}
        <div style="font-family: Helvetica,Arial,sans-serif; font-size:14px">
            {$letter_data.message}
        </div>
        <!-- end message body !-->
    </td>
</tr>
