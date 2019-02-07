<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\modal\m_p.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312155c5a2280b0c933-16537158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84160f0e4afc46e41d9712a62444a4600d5e89ba' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\modal\\m_p.tpl',
      1 => 1421081048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312155c5a2280b0c933-16537158',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2280b14630_41459982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2280b14630_41459982')) {function content_5c5a2280b14630_41459982($_smarty_tpl) {?><div class="modal fade" id="mp-modal" tabindex="-1" role="dialog" aria-labelledby="auth-modal-formLabel" aria-hidden="true">
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
