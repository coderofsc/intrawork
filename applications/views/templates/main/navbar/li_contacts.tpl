<li class="dropdown">
    <a href="contacts/" class="dropdown-toggle" data-toggle="dropdown">{cls_modules::$ar_modules[cls_modules::MODULE_CONTACTS].name} <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li>
            <a href="contacts/create/">Добавить</a>
        </li>
        {if $global_ar_contacts_types}
            <li class="divider"></li>
        {/if}
        {foreach from=$global_ar_contacts_types item=type key=type_id}
            <li class="add-action">
                <a href="contacts/?cnd[type_id]={$type_id}">{$type.name}</a>
                <a href="contacts/create/?contact_data[type_id]={$type_id}"><i class="fa fa-plus"></i></a>
            </li>
        {/foreach}
    </ul>
</li>
