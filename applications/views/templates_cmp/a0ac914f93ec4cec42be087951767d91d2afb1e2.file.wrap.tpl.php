<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:06
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\comments\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:288435c5a29da2c1f87-66633942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0ac914f93ec4cec42be087951767d91d2afb1e2' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\comments\\wrap.tpl',
      1 => 1454682658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '288435c5a29da2c1f87-66633942',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29da2c9c81_19341655',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29da2c9c81_19341655')) {function content_5c5a29da2c9c81_19341655($_smarty_tpl) {?><legend>Комментарии</legend>

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
