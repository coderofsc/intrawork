<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\modal\avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:250505c5a2280b89955-88129693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b2f833e10fa36807575b930954fa9b70c031b49' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\modal\\avatar.tpl',
      1 => 1434233018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250505c5a2280b89955-88129693',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_url_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2280b91651_85493251',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2280b91651_85493251')) {function content_5c5a2280b91651_85493251($_smarty_tpl) {?><div class="modal inmodal" id="avatar-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg ui-layout-lg ui-layout-md ui-layout-sm ui-layout-xs">
		<div class="modal-content animated bounceInDown">
            <form class="avatar-form" action="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
set_avatar/" enctype="multipart/form-data" method="post">
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

                
            </form>

		</div>
	</div>
</div>
<?php }} ?>
