{*<button class="btn btn-primary btn-block">Загрузить</button>*}
<form id="fileupload" action="files/upload/" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="folder_id" id="current_folder_id" value="0">
<div class="row">
    <div class="col-sm-12">
		<span class="btn btn-default btn-block fileinput-button" id="fileinput-button">
			<span><i class="fa fa-upload"></i> {L::text_add_files}</span>
			<input type="file" name="file" multiple="">
		</span>
    </div>
</div>
</form>

<div class="row">
    <div class="col-sm-12 hidden" id="progress-upload">
        <div class="space space-sm"></div>
        <div id="progress-upload-files" class="progress progress-striped active">
            <div class="progress-bar progress-bar-success" {*aria-valuenow="0"*} aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
        </div>
        <div id="progress-upload-files-status">Загружено: 0 / 0</div>
    </div>
</div>
