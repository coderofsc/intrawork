<link rel="stylesheet" href="resources/js/jquery/plugin/todolist/jquery.todolist.css" />
<script type="text/javascript" src="resources/js/jquery/plugin/todolist/jquery.todolist.js"></script>

{include file="./form/form.tpl"}
<div class="space"></div>
{include file="./list.tpl"}

<script>
    $(document).ready(function() {
        TodoListIW.init({$demand_id|default:0}, {if $lazy_writing}true{else}false{/if});
    });
</script>