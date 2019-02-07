<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:48:52
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\comments\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:225215c5af3d4aeeaa8-65888101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d19ee2aba353fd7c8e7c413b9a2ba219529745d' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\comments\\wrap.tpl',
      1 => 1454682658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '225215c5af3d4aeeaa8-65888101',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af3d4b02326_32159385',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af3d4b02326_32159385')) {function content_5c5af3d4b02326_32159385($_smarty_tpl) {?><legend>Комментарии</legend>

<style>
    #comments-container .media {
        border-bottom: 1px solid #f1f1f1;
        margin: 10px;
        padding: 10px;
    }

    #comments-container .forum-avatar:hover {
        text-decoration: none;
    }

    #comments-container .forum-avatar {
        float: left;
        margin-right: 20px;
        text-align: center;
        width: 110px;
    }

    #comments-container .forum-avatar .img-circle {
        height: 48px;
        width: 48px;
    }

    #comments-container .author-info {
        color: #676a6c;
        font-size: 11px;
        margin-top: 5px;
        text-align: center;
    }

    #comments-container .media-body > .media {
        background: #f9f9f9 none repeat scroll 0 0;
        border: 1px solid #f1f1f1;
        border-radius: 3px;
    }
</style>

<div class="ibox-content" id="comments-container">
<?php echo $_smarty_tpl->getSubTemplate ("./list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php }} ?>
