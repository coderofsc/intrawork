<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:54
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\modal\m_p.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196625991b63a0d9d83-12728319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ffaf0219620e89c4f6e95354bdfd51bf9b75518' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\modal\\m_p.tpl',
      1 => 1421081048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196625991b63a0d9d83-12728319',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b63a0df5c9_60095264',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b63a0df5c9_60095264')) {function content_5991b63a0df5c9_60095264($_smarty_tpl) {?><div class="modal fade" id="mp-modal" tabindex="-1" role="dialog" aria-labelledby="auth-modal-formLabel" aria-hidden="true">
	<div class="modal-dialog modal-fluid">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<h3 class="clamped">Диалоги <span id="mp-loading"><i class="fa fa-cog fa-spin text-info"></i></span></h3>
					</div>
					<div class="col-sm-8 col-md-8 col-lg-8">
						<div>
							<h3 id="messages-title" class="clamped pull-left"></h3>
							<div id="messages-toolbar" class="pull-right hidden">
								<button class="btn btn-default btn-sm load-more-messages" onclick="m_p.load_more_prev();"><span class="text-danger">Показать еще 10 предыдущих</span></button>
								<button class="btn btn-default btn-sm clear-thread" onclick="m_p.clear_thread();"><span class="text-warning">Очистить диалог</span></button>
								<button class="btn btn-default btn-sm delete-thread" onclick="m_p.delete_thread();"><span class="text-danger">Удалить диалог</span></button>

							</div>
						</div>
					</div>
					<div class="col-sm-1 col-md-1 col-lg-1">
						<button data-dismiss="modal" type="button" class="btn btn-default btn-sm pull-right">&times;</button>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<div class="list-group" id="thread-list">
						</div>
					</div>
					<div class="col-sm-9 col-md-9 col-lg-9">
						<div class="nano" id="messages-container">
							<div class="nano-content"></div>
						</div>

						<div id="messages-form" class="invisible">
							<div class="form-group">
								
								<textarea rows="3" maxlength="512" class="form-control" placeholder="Введите текст сообщения"></textarea>
							</div>
							<button id="send-message" data-loading-text="Отправка..." class="btn btn-sm btn-primary">Отправить сообщение</button> или CTRL+Enter
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php }} ?>
