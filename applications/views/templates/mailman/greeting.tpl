<tr>
    <td>
        <!-- greeting  !-->
        <font face="Helvetica,Arial,sans-serif" style="font-size:14px">
        {if $letter_data.user_to_id}{L::text_hello}, {$letter_data.user_to_fi}!{else}{L::text_hello}!{/if}
        </font>
        <br/><br/>
        <!-- end greeting  !-->
    </td>
</tr>