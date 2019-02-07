<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:52:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104075c5a21a76f4082-13141784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdcfab33c7b91ec5affda474a45b219f7feba815' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\head.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104075c5a21a76f4082-13141784',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'ar_resource' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a21a772ab87_87802856',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a21a772ab87_87802856')) {function content_5c5a21a772ab87_87802856($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.date_format.php';
?><!--
Интраворк <?php echo @constant('IW_VERSION');?>
 | http://intrawork.ru
Права защищены 2007-<?php echo smarty_modifier_date_format(time(),"%Y");?>
 Исходный код  | http://www.src-code.ru
Сделано в России!
-->

<head>
    <title><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['controller_info']->value['meta_title']);?>
 :: Интраворк <?php echo @constant('IW_VERSION');?>
</title>

	<base href="http://<?php echo $_SERVER['HTTP_HOST'];?>
" />
    <link rel="icon" href="<?php echo @constant('HOST_ROOT');?>
resources/images/favicon.png" />

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['controller_info']->value['meta_description']);?>
">

	<?php echo '<script'; ?>
>
        window.paceOptions = {
			restartOnRequestAfter: true
		};
	<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="resources/js/native/pace.min.js"><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("helpers/include_resource_css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_resource'=>$_smarty_tpl->tpl_vars['ar_resource']->value['head']['css']), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("helpers/include_resource_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_resource'=>$_smarty_tpl->tpl_vars['ar_resource']->value['head']['js']), 0);?>


    <?php echo '<script'; ?>
>
        Tinycon.setOptions({
            background: '#F89406'
        });
    <?php echo '</script'; ?>
>


</head>
<?php }} ?>
