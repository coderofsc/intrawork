<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:06
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:305695c5a29da0aeb01-44777225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82d68df452ba2b6ba6a517d8234ae658767ea998' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\view\\wrap.tpl',
      1 => 1454622234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305695c5a29da0aeb01-44777225',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_demands_last' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29da0ca088_08245654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29da0ca088_08245654')) {function content_5c5a29da0ca088_08245654($_smarty_tpl) {?><div class="row">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                <?php echo $_smarty_tpl->getSubTemplate ("contacts/view/block_avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <div class="clearfix"></div>
                <div class="space"></div>
            </div>
            
        </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
        <?php echo $_smarty_tpl->getSubTemplate ("contacts/view/block_about.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <div class="h3"><?php echo L::modules_contacts_text_headers_last_demands;?>
</div>
        <?php echo $_smarty_tpl->getSubTemplate ("demands/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_demands'=>$_smarty_tpl->tpl_vars['ar_demands_last']->value,'module_id'=>cls_modules::MODULE_DEMANDS,'denied_delete'=>true,'collapsed'=>true), 0);?>

    </div>
</div>
<?php }} ?>
