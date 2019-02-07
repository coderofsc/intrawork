<link rel="stylesheet" type="text/css" href="resources/css/fm.css" />
<script type="text/javascript" src="resources/js/jquery/plugin/jquery.mixitup.min.js"></script>
<link rel="stylesheet" type="text/css" href="resources/js/jquery/plugin/nestable/css/nestable.css" />
<script type="text/javascript" src="resources/js/jquery/plugin/nestable/js/jquery.nestable.js"></script>
<link rel="stylesheet" type="text/css" href="min/?g=fileuploadcss" />
<script type="text/javascript" src="min/?g=fileuploadjs"></script>

<div class="ui-layout-west">
    <div class="container-fluid">
        <div class="file-manager">
            <h5>Фильтр</h5>
            {include file="./filter.tpl"}

            <div class="hr-line-dashed"></div>
            {include file="./upload.tpl"}
            <div class="hr-line-dashed"></div>

            <h5>Структура <i class="fa fa-spinner fa-fw fa-spin hidden" id="folder-loading"></i> </h5>
            <div id="fm-folders">
                {include file="./folders.tpl"}
            </div>

            <div class="space space-sm"></div>

            {if cls_modules::MODULE_FILES|access:m_roles::CRUD_R}
            <div class="alert alert-info">
                Перенесите файл или папку в секцию "Общие файлы", чтобы сделать их видимыми для других пользователей.
            </div>
            {/if}

            {*
            <h5 class="tag-title">Теги</h5>
            {include file="./tags.tpl"}
            <div class="clearfix"></div>*}
        </div>
    </div>
</div>

<div class="ui-layout-center jscroll {*animated fadeInDown*}">
    {include file="main/title.tpl"}
    <div id="empty-folder" class="alert alert-default" style="display: none">Файлы не найдены</div>
    {include file="./list.tpl"}
</div>

<script src="resources/js/intrawork.fm.js"></script>