{if $contact_data.descr}
    <p>
        {$contact_data.descr}
    </p>
{else}
    <div class="alert alert-default">
        Дополнительная информация не указана
    </div>
{/if}