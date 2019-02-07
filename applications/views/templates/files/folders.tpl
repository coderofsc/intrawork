{function name=folder_level nested=0 ar_tree=array() open=false}
    <ol class="dd-list">
        {if !$nested}
            <li class="dd-item dd-nodrag" data-id="0">
                <a data-id="0" class="dd-content c-hand">
                    <span class="title">Ваши файлы</span>
                </a>
            </li>
        {/if}
        {foreach from=$ar_tree item=folder key=folder_id}
            {if !$folder.id}{continue}{/if}

            {if $folder_id == $smarty.const.FILE_PUBLIC}
                {assign var="public" value=true}
            {else}
                {assign var="public" value=false}
            {/if}

            <li class="dd-item {if $public}dd-nodrag public-folder{/if}" data-id="{$folder_id}">
                {if !$public}
                    <button class="btn btn-default btn-sm dd-handle"><i class="fa fa-arrows-alt"></i></button>
                {/if}
                <a data-id="{$folder_id}" class="dd-content c-hand {if $public}dd-handle{/if}">
                    <span class="title text-ellipsis">{$folder.name}</span>
                    <div class="clearfix"></div>
                </a>
                {if !$public && ($folder.user_id == $cuser_data.id || (cls_modules::MODULE_FILES|access:m_roles::CRUD_U || cls_modules::MODULE_FILES|access:m_roles::CRUD_D))}
                <div class="dd-extra">
                    <div class="pull-right">
                        <div class="btn-group btn-group-sm btn-group-actions">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Меню с переключением</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-wauto" role="menu">
                                {if $folder.user_id == $cuser_data.id || cls_modules::MODULE_FILES|access:m_roles::CRUD_U}
                                    <li><a href="#" class="folder-edit"><i class="fa fa-pencil fa-fw"></i> {L::actions_edit}</a></li>
                                {/if}
                                {if $folder.user_id == $cuser_data.id || cls_modules::MODULE_FILES|access:m_roles::CRUD_D}
                                    <li><a href="#" class="text-danger folder-delete"><i class="fa fa-trash-o fa-fw"></i> {L::actions_delete}</a></li>
                                {/if}
                            </ul>
                        </div>
                    </div>
                </div>
                {/if}

                {if $folder.children}
                    {folder_level nested=$nested+1 ar_tree=$folder.children}
                {/if}
            </li>
        {/foreach}
    </ol>
{/function}


<div class="dd folder-list" id="folders-nestable">
    {folder_level nested=0 ar_tree=$ar_tree_folders}
</div>

<div class="space space-sm"></div>
<button class="btn btn-default btn-block folder-create"><i class="fa fa-folder-open"></i> Создать папку</button>