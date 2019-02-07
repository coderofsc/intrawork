<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:55
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\files\filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137355a0428474c5ed2-87370004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cdd679d465e734955882cfda34fd1bc4f7f299d' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\files\\filter.tpl',
      1 => 1448898276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137355a0428474c5ed2-87370004',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a0428474d5097_10583740',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0428474d5097_10583740')) {function content_5a0428474d5097_10583740($_smarty_tpl) {?><div class="controls">
    <button class="btn btn-xs btn-link filter active" data-filter="all" >Все</button>
    <button class="btn btn-xs btn-link filter" data-filter=".file-type-doc" >Документы</button>
    <button class="btn btn-xs btn-link filter" data-filter=".file-type-audio" >Аудио</button>
    <button class="btn btn-xs btn-link filter" data-filter=".file-type-video">Видео</button>
    <button class="btn btn-xs btn-link filter" data-filter=".file-type-image" >Изображения</button>
</div>

<?php }} ?>
