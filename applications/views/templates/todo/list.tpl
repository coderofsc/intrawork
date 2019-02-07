<ul id="todo-list" class="ui-sortable">
    {foreach from=$ar_todo.data item=todo key=todo_id}
        <li class="list-primary {if $todo.status}todo-done{/if}" data-id="{$todo_id}">
            {if !$readonly}
                <i class=" fa fa-ellipsis-v"></i>
            {/if}
        <div class="todo-toggle i-checks">
            <input name="todo[{$todo_id}][status]" type="checkbox" {if $todo.status}checked=""{/if} value="1"/>
        </div>
        <div class="todo-title">
            <input name="todo[{$todo_id}][title]" type="hidden" value="{$todo.title}"/>
            <span class="todo-title-sp">{$todo.title}</span>
            {if !$readonly}
            <div class="pull-right todo-actions">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-default btn-sm fa fa-pencil"></button>
                    <button class="btn btn-danger btn-sm fa fa-trash-o"></button>
                </div>
            </div>
        </div>
            {/if}
        </li>
    {/foreach}
</ul>