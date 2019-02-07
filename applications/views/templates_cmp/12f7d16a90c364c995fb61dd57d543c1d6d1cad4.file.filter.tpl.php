<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:36
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\files\filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:315755c5a29f8e7cf07-66356694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12f7d16a90c364c995fb61dd57d543c1d6d1cad4' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\files\\filter.tpl',
      1 => 1448898276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '315755c5a29f8e7cf07-66356694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29f8e7cf02_64591026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29f8e7cf02_64591026')) {function content_5c5a29f8e7cf02_64591026($_smarty_tpl) {?><div class="controls">
    <button class="btn btn-xs btn-link filter active" data-filter="all" >Все</button>
    <button class="btn btn-xs btn-link filter" data-filter=".file-type-doc" >Документы</button>
    <button class="btn btn-xs btn-link filter" data-filter=".file-type-audio" >Аудио</button>
    <button class="btn btn-xs btn-link filter" data-filter=".file-type-video">Видео</button>
    <button class="btn btn-xs btn-link filter" data-filter=".file-type-image" >Изображения</button>
</div>

<?php }} ?>
