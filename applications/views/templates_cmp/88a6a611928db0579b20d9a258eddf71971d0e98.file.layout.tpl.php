<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:26:03
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mailbots\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119835c5a299b4790b5-02943586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88a6a611928db0579b20d9a258eddf71971d0e98' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mailbots\\form\\layout.tpl',
      1 => 1451468804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119835c5a299b4790b5-02943586',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'record_limit' => 0,
    'config' => 0,
    'mb_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a299b4fddd3_29367614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a299b4fddd3_29367614')) {function content_5c5a299b4fddd3_29367614($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">

    <?php if ($_smarty_tpl->tpl_vars['record_limit']->value) {?>
    <div class="alert alert-danger">
        <h4>Достигнут лимит почтовых ботов</h4>
        <p>Установлено максимальное количество ботов: <?php echo $_smarty_tpl->tpl_vars['config']->value->mailbots_limit;?>
</p>
    </div>
    <?php } else { ?>

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="row">
            <div class="col-sm-8">
                <?php echo $_smarty_tpl->getSubTemplate ("./general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="col-sm-4">
                <div class="alert alert-warning"><h4><?php echo smarty_modifier_mb_ucfirst(L::modules_mailbots_morph_one);?>
</h4>
                    <?php echo L::modules_mailbots_alerts_abstract;?>

                </div>
            </div>
        </div>

        <div id="mailbox-setup" <?php if ($_smarty_tpl->tpl_vars['mb_data']->value&&!$_smarty_tpl->tpl_vars['mb_data']->value['status']) {?>style="display:none"<?php }?>>
            <legend><?php echo L::forms_legends_mailbots_mailbox;?>
</legend>
            <div class="row">
                <div class="col-sm-8">
                    <?php echo $_smarty_tpl->getSubTemplate ("./mailbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
                <div class="col-sm-4">
                    <div class="alert alert-info">
                        <h4><?php echo L::forms_legends_mailbots_mailbox;?>
</h4>
                        <?php echo L::modules_mailbots_alerts_check_connect;?>

                    </div>
                </div>
            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['mb_data']->value['id'])), 0);?>

    </form>
    <?php }?>
</div>

<?php echo '<script'; ?>
>
    $("#mb_data_status").on("change", function() {
        $("#mailbox-setup").slideToggle();
    });
<?php echo '</script'; ?>
><?php }} ?>
