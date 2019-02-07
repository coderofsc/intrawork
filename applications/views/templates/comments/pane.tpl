<form id="comment-form">
    <div class="ui-layout-south pane-content-sm" id="comment-form-pane">
        {include file="./form.tpl"}
    </div>
</form>

{include file="./pane_toggler.tpl"}

<script src="resources/js/intrawork.comments.js"></script>
<script>
    $(function () {
        commentsIW.init('{$controller_info.module.alias}', {$controller_info.module_id}, {$owner_id|intval});
    });
</script>
