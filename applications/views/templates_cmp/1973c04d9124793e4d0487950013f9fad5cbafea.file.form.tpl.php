<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:48:52
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\comments\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140605c5af3d4b6f947-83214507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1973c04d9124793e4d0487950013f9fad5cbafea' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\comments\\form.tpl',
      1 => 1454924966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140605c5af3d4b6f947-83214507',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af3d4b7f343_12752609',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af3d4b7f343_12752609')) {function content_5c5af3d4b7f343_12752609($_smarty_tpl) {?>

<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#form" data-toggle="tab"><?php echo L::tabs_message;?>
</a></li>
        <li><a href="#attach" data-toggle="tab"><?php echo L::tabs_files;?>
</a></li>
        <li class="pull-right">
            <button class="btn btn-default btn-sm btn-comment-pane-toggler pull-right">
                <i class="fa fa-times"></i><span class="hidden-xs"> <?php echo L::text_close;?>
</span>
            </button>
        </li>
    </ul>
</div>

<div class="ui-layout-content">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane active" id="form">
                <textarea name="comment_data[text]" style="border:0px; height: 99%; width:100%" placeholder="Нажмите CTRL+Enter отправки сообщения"></textarea>
            </div>
            <div class="tab-pane" id="attach">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/attached_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="space space-xs"></div>

    <div class="form-inline row">
        <div class="form-group  col-sm-12">
            <button type="submit" class="btn btn-primary" data-loading-text="Отправка, ждите..."><i class="fa fa-send"></i> Отправить</button>
        </div>

    </div>

</div>

<?php }} ?>
