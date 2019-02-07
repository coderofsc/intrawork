<table id="attach_files" role="presentation" class="table table-striped {if !$tender_data.attach_files}hidden{/if}">
    {*
    {foreach key=cid name=af_names item=file from=$demand_data.attach_files}
        <tr id="attach_file_{$file.hash}">
            <td>
                {if $file.mimetype == 'image/jpeg' ||
                $file.mimetype == 'image/gif' ||
                $file.mimetype == 'image/png' ||
                $file.mimetype == 'image/bmp'}
                    <a rel="attach" href="{$file.hash|storage_path:$smarty.const.STORAGE_DIR_DEMANDS}{$file.hash}.{$file.ext}" class="fancybox" title="{$file.name}.{$file.ext}">
                        <img src="{$file.hash|storage_path:$smarty.const.STORAGE_DIR_DEMANDS}thumbs/{$file.hash}.jpg" height="100" class="img-thumbnail img-circle" style="width:32px; height:32px" />
                    </a>
                {/if}
                <span class="hidden-xs">{$file.name}.{$file.ext}</span>
            </td>
            <td>{$file.size|filesize}</td>
            <td class="text-right">
                <a href="#{$file.hash}" data-attach-id="{$file.attach_id}" class="attach-delete btn btn-sm btn-warning"><i class="fa fa-times"></i> {L::actions_delete}</a>
            </td>
        </tr>
    {/foreach}
    *}
</table>

<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
		<span class="btn btn-default fileinput-button" id="fileinput-button">
			<span>{L::text_add_files}</span>
			<input id="fileupload" type="file" name="file" multiple="" data-url="{$controller_info.module.alias}/create/attach/">
		</span>
        {*<i class="fa fa-question" data-container="body" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{L::alerts_info_attached_ctrl}"></i>*}
    </div>
    <div class="col-sm-8 hidden" id="progress-upload">
        <div id="progress-upload-files" class="progress progress-striped active">
            <div class="progress-bar progress-bar-success" {*aria-valuenow="0"*} aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
        </div>
        <div id="progress-upload-files-status">Загружено: 0 / 0</div>
    </div>
</div>
{*
<div class="help-block">
    {L::alerts_info_attached_ctrl}
</div>
*}


{literal}

<script src="min/?g=fileuploadjs"></script>
<script src="resources/js/jquery/plugin/fileupload/js/jquery.client.js"></script>
<link href="min/?g=fileuploadcss" type="text/css" rel="stylesheet" />

<script>

</script>
{/literal}

