<legend>Комментарии</legend>

<style>
    #comments-container .media {
        border-bottom: 1px solid #f1f1f1;
        margin: 10px;
        padding: 10px;
    }

    #comments-container .forum-avatar:hover {
        text-decoration: none;
    }

    #comments-container .forum-avatar {
        float: left;
        margin-right: 20px;
        text-align: center;
        width: 110px;
    }

    #comments-container .forum-avatar .img-circle {
        height: 48px;
        width: 48px;
    }

    #comments-container .author-info {
        color: #676a6c;
        font-size: 11px;
        margin-top: 5px;
        text-align: center;
    }

    #comments-container .media-body > .media {
        background: #f9f9f9 none repeat scroll 0 0;
        border: 1px solid #f1f1f1;
        border-radius: 3px;
    }
</style>

<div class="ibox-content" id="comments-container">
{include file="./list.tpl"}
</div>

