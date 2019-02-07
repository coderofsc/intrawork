{*<input type="hidden" name="comment_data[owner_id]" value="{$owner_id|intval}" />*}

<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#form" data-toggle="tab">{L::tabs_message}</a></li>
        <li><a href="#attach" data-toggle="tab">{L::tabs_files}</a></li>
        <li class="pull-right">
            <button class="btn btn-default btn-sm btn-comment-pane-toggler pull-right">
                <i class="fa fa-times"></i><span class="hidden-xs"> {L::text_close}</span>
            </button>
        </li>
    </ul>
</div>

<div class="ui-layout-content">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane active" id="form">
                <textarea name="comment_data[text]" style="border:0px; height: 99%; width:100%" placeholder="Нажмите CTRL+Enter отправки сообщения"></textarea>
            </div>
            <div class="tab-pane" id="attach">
                {include file="helpers/attached_table.tpl"}
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="space space-xs"></div>

    <div class="form-inline row">
        <div class="form-group {*pull-right text-right*} col-sm-12">
            <button type="submit" class="btn btn-primary" data-loading-text="Отправка, ждите..."><i class="fa fa-send"></i> Отправить</button>
        </div>

    </div>

</div>

