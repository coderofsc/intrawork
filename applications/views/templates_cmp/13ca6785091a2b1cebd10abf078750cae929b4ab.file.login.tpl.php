<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-21 16:53:55
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\render\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25705599ae5f331ccb4-88642386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13ca6785091a2b1cebd10abf078750cae929b4ab' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\render\\login.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25705599ae5f331ccb4-88642386',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_data' => 0,
    'ar_resource' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_599ae5f34c6de9_63897205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599ae5f34c6de9_63897205')) {function content_599ae5f34c6de9_63897205($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
<?php echo $_smarty_tpl->getSubTemplate ("main/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<body >

    <link rel="stylesheet" href="resources/css/login.css">
    <link rel="stylesheet" href="resources/css/animate.css">

    <?php echo '<script'; ?>
 type="text/javascript" src="resources/js/intrawork.login.js"><?php echo '</script'; ?>
>

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-lg-12">
                <table id="table-container" width="100%" cellpadding="40px" cellspacing="40px" bgcolor="yellow">
                    <tr>
                        <td width="50%" class="text">
                            <h2 class="font-bold"><?php echo L::text_welcome;?>
 <?php echo @constant('IW_VERSION');?>
</h2>

                            <?php echo L::modules_login_text_leader;?>


                            <div class="space"></div>
                            <div class="space"></div>

                            <a href="http://www.src-code.ru"><img src="resources/images/src-code-logo-w.png" alt="Исходный Код" /></a>
                        </td>
                        <td>
                            <div class="ibox-content">

                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/alerts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                <div class="space"></div>
                                <?php echo $_smarty_tpl->tpl_vars['controller_data']->value;?>


                                <p class="text-muted text-center">
                                    <small><?php echo L::modules_login_text_header_create_account;?>
</small>
                                </p>
                                <a class="btn btn-sm btn-white btn-block" href="http://intrawork.ru/establish/"><?php echo L::modules_login_text_create_account;?>
</a>
                                <div class="space"></div>
                                <p class="text-center">
                                    <small><?php echo L::meta_title;?>
</small>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>

            </div>

            
        </div>
        
        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6 text-right text">
                <div class="small">© 2007-<?php echo smarty_modifier_date_format(time(),"%Y");?>
</div>
                <div class="small"><?php echo L::modules_login_text_made_in;?>
</div>
            </div>
        </div>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("helpers/include_resource_css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_resource'=>$_smarty_tpl->tpl_vars['ar_resource']->value['foot']['css']), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("helpers/include_resource_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_resource'=>$_smarty_tpl->tpl_vars['ar_resource']->value['foot']['js']), 0);?>


</body>

</html><?php }} ?>
