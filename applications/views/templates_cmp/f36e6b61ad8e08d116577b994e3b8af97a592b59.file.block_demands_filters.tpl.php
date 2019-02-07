<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\sidebar\block_demands_filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322855c5a4312599995-30963223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f36e6b61ad8e08d116577b994e3b8af97a592b59' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\sidebar\\block_demands_filters.tpl',
      1 => 1451003112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322855c5a4312599995-30963223',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cuser_data' => 0,
    'filter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a43125c4915_25172908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a43125c4915_25172908')) {function content_5c5a43125c4915_25172908($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><ul class="sidebar-block">
        <li>
            <a href="#" class="row header" onclick="$(this).find('.btn-toggle').click(); return false;">
                <div class="col-sm-9">
                    <i class="fa fa-fw fa-filter text-white"></i>
                    <span class="nav-label"><?php echo L::sidebar_save_filters;?>
</span>
                </div>
                <div class="col-sm-2 text-center">
                    <span class="badge badge-count"><?php echo sizeof($_smarty_tpl->tpl_vars['cuser_data']->value['ar_filters']);?>
</span>
                </div>
                <div class="col-sm-1 btn-toggle">
                    <i class="fa fa-fw fa-caret-down"></i>
                </div>
            </a>

            <ul>
                <?php  $_smarty_tpl->tpl_vars['filter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filter']->_loop = false;
 $_smarty_tpl->tpl_vars['filter_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cuser_data']->value['ar_filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->key => $_smarty_tpl->tpl_vars['filter']->value) {
$_smarty_tpl->tpl_vars['filter']->_loop = true;
 $_smarty_tpl->tpl_vars['filter_id']->value = $_smarty_tpl->tpl_vars['filter']->key;
?>
                    <li class="row">
                        <a class="col-sm-11" href="demands/?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['filter']->value['conditions'],"cnd");
if ($_smarty_tpl->tpl_vars['filter']->value['sort']) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['filter']->value['sort'],"sort");
}?>">
                            <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['filter']->value['name'];?>
</span>
                        </a>
                        <a href="demands/search/<?php echo $_smarty_tpl->tpl_vars['filter']->value['id'];?>
/delete/" class="col-sm-1 text-right delete">
                           <i class="fa-fw fa fa-times text-danger"></i>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
</ul>

<?php echo '<script'; ?>
>

<?php echo '</script'; ?>
><?php }} ?>
