{assign var="menu_item_count" value=0}

{if cls_modules::MODULE_USERS|access:m_roles::CRUD_R ||
cls_modules::MODULE_DEPARTMENTS|access:m_roles::CRUD_R ||
cls_modules::MODULE_POSTS|access:m_roles::CRUD_R ||
cls_modules::MODULE_CONTACTS|access:m_roles::CRUD_R ||
cls_modules::MODULE_NEWS|access:m_roles::CRUD_R ||
cls_modules::MODULE_MROOMS|access:m_roles::CRUD_R}
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{L::navbar_company} <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">

            {if cls_modules::MODULE_USERS|access:m_roles::CRUD_R}
                <li{if cls_modules::MODULE_USERS|access:m_roles::CRUD_C} class="add-action"{/if}>
                    <a href="users/">{cls_modules::$ar_modules[cls_modules::MODULE_USERS].name}</a>
                    {if cls_modules::MODULE_USERS|access:m_roles::CRUD_C}<a href="users/create/"><i class="fa fa-plus"></i></a>{/if}
                </li>
                {assign var="menu_item_count" value=$menu_item_count+1}
            {/if}

            {if cls_modules::MODULE_DEPARTMENTS|access:m_roles::CRUD_R}
                <li{if cls_modules::MODULE_DEPARTMENTS|access:m_roles::CRUD_C} class="add-action"{/if}>
                    <a href="departments/">{cls_modules::$ar_modules[cls_modules::MODULE_DEPARTMENTS].name}</a>
                    {if cls_modules::MODULE_DEPARTMENTS|access:m_roles::CRUD_C}<a href="departments/create/"><i class="fa fa-plus"></i></a>{/if}
                </li>
                {assign var="menu_item_count" value=$menu_item_count+1}
            {/if}

            {if cls_modules::MODULE_POSTS|access:m_roles::CRUD_R}
                <li {if cls_modules::MODULE_POSTS|access:m_roles::CRUD_C}class="add-action"{/if}>
                    <a href="posts/">{cls_modules::$ar_modules[cls_modules::MODULE_POSTS].name}</a>
                    {if cls_modules::MODULE_POSTS|access:m_roles::CRUD_C}<a href="posts/create/"><i class="fa fa-plus"></i></a>{/if}
                </li>
                {assign var="menu_item_count" value=$menu_item_count+1}
            {/if}

            {if $menu_item_count}
                <li role="presentation" class="divider"></li>
            {/if}

            {if cls_modules::MODULE_NEWS|access:m_roles::CRUD_R}
                <li{if cls_modules::MODULE_NEWS|access:m_roles::CRUD_C} class="add-action"{/if}>
                    <a href="news/">{cls_modules::$ar_modules[cls_modules::MODULE_NEWS].name}</a>
                    {if cls_modules::MODULE_NEWS|access:m_roles::CRUD_C}<a href="news/create/"><i class="fa fa-plus"></i></a>{/if}
                </li>
            {/if}

            {if cls_modules::MODULE_MROOMS|access:m_roles::CRUD_R}
                <li{if cls_modules::MODULE_MROOMS|access:m_roles::CRUD_C} class="add-action"{/if}>
                    <a href="mrooms/">{cls_modules::$ar_modules[cls_modules::MODULE_MROOMS].name}</a>
                    {if cls_modules::MODULE_MROOMS|access:m_roles::CRUD_C}<a href="mrooms/create/"><i class="fa fa-plus"></i></a>{/if}
                </li>
            {/if}

        </ul>
    </li>
{/if}
