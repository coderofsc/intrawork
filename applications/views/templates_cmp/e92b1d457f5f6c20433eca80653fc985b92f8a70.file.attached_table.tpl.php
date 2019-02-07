<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\helpers\attached_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7445c5a4690bf3360-80510299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e92b1d457f5f6c20433eca80653fc985b92f8a70' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\helpers\\attached_table.tpl',
      1 => 1454920038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7445c5a4690bf3360-80510299',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tender_data' => 0,
    'controller_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4690c02d78_34642515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4690c02d78_34642515')) {function content_5c5a4690c02d78_34642515($_smarty_tpl) {?><table id="attach_files" role="presentation" class="table table-striped <?php if (!$_smarty_tpl->tpl_vars['tender_data']->value['attach_files']) {?>hidden<?php }?>">
    
</table>

<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
		<span class="btn btn-default fileinput-button" id="fileinput-button">
			<span><?php echo L::text_add_files;?>
</span>
			<input id="fileupload" type="file" name="file" multiple="" data-url="<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/create/attach/">
		</span>
        
    </div>
    <div class="col-sm-8 hidden" id="progress-upload">
        <div id="progress-upload-files" class="progress progress-striped active">
            <div class="progress-bar progress-bar-success"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
        </div>
        <div id="progress-upload-files-status">Загружено: 0 / 0</div>
    </div>
</div>





<?php echo '<script'; ?>
 src="min/?g=fileuploadjs"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/fileupload/js/jquery.client.js"><?php echo '</script'; ?>
>
<link href="min/?g=fileuploadcss" type="text/css" rel="stylesheet" />

<?php echo '<script'; ?>
>

<?php echo '</script'; ?>
>


<?php }} ?>
