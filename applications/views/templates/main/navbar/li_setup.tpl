{assign var="menu_item_count" value=0}

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog {*fa-lg*}"></i> {*<b class="caret"></b>*}</a>
    <ul class="dropdown-menu dropdown-menu-right">

        {if cls_modules::MODULE_ROLES|access:m_roles::CRUD_R}
            <li{if cls_modules::MODULE_ROLES|access:m_roles::CRUD_C} class="add-action"{/if}>
                <a href="roles/">{cls_modules::$ar_modules[cls_modules::MODULE_ROLES].name}</a>
                {if cls_modules::MODULE_ROLES|access:m_roles::CRUD_C}<a href="roles/create/"><i class="fa fa-plus"></i></a>{/if}
            </li>
            {assign var="menu_item_count" value=$menu_item_count+1}
        {/if}

        {if cls_modules::MODULE_CATEGORIES|access:m_roles::CRUD_U}
            <li{if cls_modules::MODULE_CATEGORIES|access:m_roles::CRUD_C} class="add-action"{/if}>
                <a href="categories/">{cls_modules::$ar_modules[cls_modules::MODULE_CATEGORIES].name}</a>
                {if cls_modules::MODULE_CATEGORIES|access:m_roles::CRUD_C}<a href="categories/create/"><i class="fa fa-plus"></i></a>{/if}
            </li>
            {assign var="menu_item_count" value=$menu_item_count+1}
        {/if}

        {if cls_modules::MODULE_CONTACTS_TYPES|access:m_roles::CRUD_R}
            <li{if cls_modules::MODULE_CONTACTS_TYPES|access:m_roles::CRUD_C} class="add-action"{/if}>
                <a href="contacts/types/">{cls_modules::$ar_modules[cls_modules::MODULE_CONTACTS_TYPES].name}</a>
                {if cls_modules::MODULE_CONTACTS_TYPES|access:m_roles::CRUD_C}<a href="contacts/types/create/"><i class="fa fa-plus"></i></a>{/if}
            </li>
            {assign var="menu_item_count" value=$menu_item_count+1}
        {/if}

        {if cls_modules::MODULE_DEMANDS_TYPES|access:m_roles::CRUD_R}
            <li{if cls_modules::MODULE_DEMANDS_TYPES|access:m_roles::CRUD_C} class="add-action"{/if}>
                <a href="demands/types/">{cls_modules::$ar_modules[cls_modules::MODULE_DEMANDS_TYPES].name}</a>
                {if cls_modules::MODULE_DEMANDS_TYPES|access:m_roles::CRUD_C}<a href="demands/types/create/"><i class="fa fa-plus"></i></a>{/if}
            </li>
            {assign var="menu_item_count" value=$menu_item_count+1}
        {/if}

        {*
        {if cls_modules::MODULE_ATTR_SUITES|access:m_roles::CRUD_R}
        <li{if cls_modules::MODULE_ATTR_SUITES|access:m_roles::CRUD_C} class="add-action"{/if}>
            <a href="attributes_suites/">{cls_modules::$ar_modules[cls_modules::MODULE_ATTR_SUITES].name}</a>
            {if cls_modules::MODULE_ATTR_SUITES|access:m_roles::CRUD_C}<a href="attributes_suites_form/"><i class="fa fa-plus"></i></a>{/if}
        </li>
        {/if}
        *}
        {*<li role="presentation" class="divider"></li>*}

        {if cls_modules::MODULE_MAILBOTS|access:m_roles::CRUD_R}
            <li{if cls_modules::MODULE_MAILBOTS|access:m_roles::CRUD_C} class="add-action"{/if}>
                <a href="mailbots/">{cls_modules::$ar_modules[cls_modules::MODULE_MAILBOTS].name}</a>
                {if cls_modules::MODULE_MAILBOTS|access:m_roles::CRUD_C}<a href="mailbots/create/"><i class="fa fa-plus"></i></a>{/if}
            </li>
            {assign var="menu_item_count" value=$menu_item_count+1}
        {/if}
    </ul>
</li>
