<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\navbar\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169955c5a43126d9ed2-85018881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e51bff8311db49e8da7422d18496ee295bc1d59b' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\navbar\\wrap.tpl',
      1 => 1453298284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169955c5a43126d9ed2-85018881',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_demands' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4312714862_31803402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4312714862_31803402')) {function content_5c5a4312714862_31803402($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["cnd_cat_id"] = new Smarty_variable(0, null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['ar_demands']->value['conditions']['cat_id'])) {?>

    <?php if (is_array($_smarty_tpl->tpl_vars['ar_demands']->value['conditions']['cat_id'])) {?>
        <?php $_smarty_tpl->tpl_vars['cat_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['ar_demands']->value['conditions']['cat_id'], null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['cat_id'] = new Smarty_variable(array($_smarty_tpl->tpl_vars['ar_demands']->value['conditions']['cat_id']), null, 0);?>
    <?php }?>
<?php }?>

<nav class="navbar navbar-default border-bottom" role="navigation" id="navbar-top">
    <div class="container-fluid ">
        <div class="navbar-header">
            <button onclick="pageLayout.toggle('west');" class="btn btn-default toggle-sidebar"><i class="fa fa-bars"></i> </button>
        </div>

        <div>
            <?php echo $_smarty_tpl->getSubTemplate ("./form_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <ul class="nav navbar-nav">
                
                <?php echo $_smarty_tpl->getSubTemplate ("./li_my.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php echo $_smarty_tpl->getSubTemplate ("./li_demands.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php echo $_smarty_tpl->getSubTemplate ("./li_contacts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <li><a href="files/">Файлы</a></li>
                <?php echo $_smarty_tpl->getSubTemplate ("./li_company.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php echo $_smarty_tpl->getSubTemplate ("./li_setup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php echo $_smarty_tpl->getSubTemplate ("./li_extra.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php }} ?>
