<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:06:45
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\sidebar\block_quick_filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75485c5a251551c335-12569692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e5ad83e3077f1022d88bc1a0c67c7d30412f1d7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\sidebar\\block_quick_filters.tpl',
      1 => 1452981088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75485c5a251551c335-12569692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_quick_filters' => 0,
    'qfilter' => 0,
    'filter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a25155472c2_93030793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a25155472c2_93030793')) {function content_5c5a25155472c2_93030793($_smarty_tpl) {?><ul class="sidebar-block">

    <li class=" ">
        <a href="#" class="row header" onclick="$(this).find('.btn-toggle').click(); return false;">
            <div class="col-sm-11">
                <i class="fa fa-fw fa-filter text-white"></i>
                <span class="nav-label">Быстрый фильтр</span>
            </div>
            <div class="col-sm-1 btn-toggle">
                <i class="fa fa-fw fa-caret-down"></i>
            </div>
        </a>
        <ul>
            <?php  $_smarty_tpl->tpl_vars['qfilter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['qfilter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_quick_filters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['qfilter']->key => $_smarty_tpl->tpl_vars['qfilter']->value) {
$_smarty_tpl->tpl_vars['qfilter']->_loop = true;
?>
            <li class="open">
                <div class="row header">
                    <div class="col-sm-12">
                        <strong class="text-muted"><?php echo $_smarty_tpl->tpl_vars['qfilter']->value['name'];?>
</strong>
                    </div>
                </div>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['filter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['qfilter']->value['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->key => $_smarty_tpl->tpl_vars['filter']->value) {
$_smarty_tpl->tpl_vars['filter']->_loop = true;
?>
                        <li class="row">
                            <a class="row" href="<?php echo $_smarty_tpl->tpl_vars['filter']->value['link'];?>
">
                                <div class="col-sm-9" style="padding-left: 30px">
                                    <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['filter']->value['name'];?>
</span>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <span class="badge badge-<?php echo $_smarty_tpl->tpl_vars['filter']->value['type'];?>
"><?php echo $_smarty_tpl->tpl_vars['filter']->value['count'];?>
</span>
                                </div>
                                <div class="col-sm-1"></div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </li>

</ul><?php }} ?>
