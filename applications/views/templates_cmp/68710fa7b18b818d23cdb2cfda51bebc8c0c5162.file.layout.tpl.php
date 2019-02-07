<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:13:01
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\users\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207055c5add5dde4c31-44475753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68710fa7b18b818d23cdb2cfda51bebc8c0c5162' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\users\\form\\layout.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207055c5add5dde4c31-44475753',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'record_limit' => 0,
    'config' => 0,
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5add5def6373_71869510',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5add5def6373_71869510')) {function content_5c5add5def6373_71869510($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container-fluid">
    <?php if ($_smarty_tpl->tpl_vars['record_limit']->value) {?>
        <div class="alert alert-danger">
            <h4>Достигнут лимит пользователей</h4>
            <p>Установлено максимальное количество пользователей: <?php echo $_smarty_tpl->tpl_vars['config']->value->limit->users_limit;?>
</p>
        </div>
    <?php } else { ?>
        <form class="form-horizontal form-valid form-control-changes" autocomplete="off" role="form" method="post">

            <ul class="nav nav-tabs" id="user-form-tabs">
                <li class="active"><a href="#general" data-toggle="tab"><?php echo L::tabs_general;?>
</a></li>
                <li><a href="#contacts" data-toggle="tab"><?php echo L::tabs_contacts;?>
</a></li>
                <li><a href="#notification" data-toggle="tab"><?php echo L::tabs_notification;?>
</a></li>
                <li><a href="#extra" data-toggle="tab"><?php echo L::tabs_extra;?>
</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <?php echo $_smarty_tpl->getSubTemplate ("users/form/block_general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
                <div class="tab-pane" id="contacts">
                    <?php echo $_smarty_tpl->getSubTemplate ("users/form/block_contacts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
                <div class="tab-pane" id="notification">
                    <?php echo $_smarty_tpl->getSubTemplate ("users/form/block_notification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
                <div class="tab-pane" id="extra">
                    <?php echo $_smarty_tpl->getSubTemplate ("users/form/block_extra.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>

            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['user_data']->value['id'])), 0);?>

        </form>
    <?php }?>
</div><?php }} ?>
