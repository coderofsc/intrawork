<div class="modal inmodal" id="avatar-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg ui-layout-lg ui-layout-md ui-layout-sm ui-layout-xs">
		<div class="modal-content animated bounceInDown">
            <form class="avatar-form" action="{$current_url_path}set_avatar/" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title" id="avatar-modal-label">Загрузка фотографии</h4>
                </div>
                <div class="modal-body">
                    <div class="avatar-body">

                        <!-- Upload image and data -->
                        <div class="avatar-upload">
                            <input class="avatar-src" name="avatar_src" type="hidden">
                            <input class="avatar-data" name="avatar_data" type="hidden">
                            <label for="avatarInput">Выберите изображение</label>
                            <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                        </div>

                        <!-- Crop and preview -->
                        <div class="row">
                            <div class="col-md-9">
                                <div class="avatar-wrapper cm-container"><div>Выберите изображение для аватара</div></div>
                            </div>
                            <div class="col-md-3">
                                {*<div class="avatar-preview preview-md"></div>*}
                                <div class="avatar-preview preview-sm img-thumbnail"></div>
                                <div class="avatar-preview preview-xs img-circle"></div>


                                <div class="avatar-btns">
                                        <div class="btn-group btn-group-justified">
                                            <div class="btn-group"><button class="btn btn-success" title="Zoom In" type="button" data-option="0.1" data-method="zoom" ><i class="fa fa-search-plus"></i></button></div>
                                            <div class="btn-group"><button class="btn btn-success" title="Zoom Out" type="button" data-option="-0.1" data-method="zoom" ><i class="fa fa-search-minus"></i></button></div>
                                            <div class="btn-group"><button class="btn btn-success" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-rotate-left"></i></button></div>
                                            <div class="btn-group"><button class="btn btn-success" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-rotate-right"></i></button></div>
                                        </div>

                                        <div class="btn-group btn-group-justified">
                                            <div class="btn-group"><button class="btn btn-primary avatar-save" type="submit">Загрузить</button></div>
                                            <div class="btn-group"><button class="btn btn-default" data-dismiss="modal" type="button">Отменить</button></div>
                                        </div>
                                </div>


                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>

                {*
                 <div class="modal-footer">
                     <div class="avatar-btns">
                         <div class="pull-left">
                             <div class="btn-group">
                                 <button title="Zoom In" type="button" data-option="0.1" data-method="zoom" class="btn btn-primary"><i class="fa fa-search-plus"></i></button>
                                 <button title="Zoom Out" type="button" data-option="-0.1" data-method="zoom" class="btn btn-primary"><i class="fa fa-search-minus"></i></button>
                                 <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-rotate-left"></i></button>
                                 <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-rotate-right"></i></button>
                             </div>
                         </div>
                         <div class="pull-right">
                             <div class="btn-group">
                                <button class="btn btn-primary avatar-save" type="submit">Загрузить</button>
                                <button class="btn btn-default" data-dismiss="modal" type="button">Закрыть</button>
                             </div>
                         </div>
                         <div class="clearfix"></div>
                     </div>


                </div>*}
            </form>

		</div>
	</div>
</div>
