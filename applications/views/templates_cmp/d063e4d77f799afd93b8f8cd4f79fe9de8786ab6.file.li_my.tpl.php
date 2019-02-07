<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:14:42
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\main\navbar\li_my.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243455c5a431276a775-57469641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd063e4d77f799afd93b8f8cd4f79fe9de8786ab6' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\main\\navbar\\li_my.tpl',
      1 => 1455635556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243455c5a431276a775-57469641',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cuser_data' => 0,
    'cat_id' => 0,
    'criticality_id' => 0,
    'criticality' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a43127ef499_34804737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a43127ef499_34804737')) {function content_5c5a43127ef499_34804737($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><li class="dropdown">
    <a href="demands/?cnd[mu_eid]=<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;
if ($_smarty_tpl->tpl_vars['cat_id']->value) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['cat_id']->value,"cnd[cat_id]");
}?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo L::navbar_my;?>
 <span class="badge badge-danger" data-counter="my_dd_criticality_<?php echo m_demands::CRITICALITY_EXPR;?>
"></span> <span class="badge badge-warning" data-counter="my_dd_criticality_<?php echo m_demands::CRITICALITY_HI;?>
"></span><b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="demands/?cnd[eu_eid]=<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;?>
">
                <span class="pull-left"><?php echo L::navbar_my_dd_executor;?>
</span>
                <span data-counter="my_dd_executor" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li><a href="demands/?cnd[cu_eid]=<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;?>
">
                <span class="pull-left"><?php echo L::navbar_my_dd_customer;?>
</span>
                <span data-counter="my_dd_customer" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li><a href="demands/?cnd[ru_eid]=<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;?>
">
                <span class="pull-left"><?php echo L::navbar_my_dd_responsible;?>
</span>
                <span data-counter="my_dd_responsible" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li><a href="demands/?cnd[mu_eid]=<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;?>
">
                <span class="pull-left"><?php echo L::navbar_my_dd_member;?>
</span>
                <span data-counter="my_dd_member" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>

        <li class="divider"></li>
        <?php  $_smarty_tpl->tpl_vars['criticality'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['criticality']->_loop = false;
 $_smarty_tpl->tpl_vars['criticality_id'] = new Smarty_Variable;
 $_from = m_demands::$ar_criticality; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['criticality']->key => $_smarty_tpl->tpl_vars['criticality']->value) {
$_smarty_tpl->tpl_vars['criticality']->_loop = true;
 $_smarty_tpl->tpl_vars['criticality_id']->value = $_smarty_tpl->tpl_vars['criticality']->key;
?>
            <li class="add-action">
                <a href="demands/?cnd[mu_eid]=<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];?>
&cnd[criticality][]=<?php echo $_smarty_tpl->tpl_vars['criticality_id']->value;?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;?>
">
                    <span class="pull-left"><?php echo $_smarty_tpl->tpl_vars['criticality']->value['name'];?>
</span>
                    <span data-counter="my_dd_criticality_<?php echo $_smarty_tpl->tpl_vars['criticality_id']->value;?>
" class="badge badge-<?php if ($_smarty_tpl->tpl_vars['criticality_id']->value==m_demands::CRITICALITY_EXPR) {?>danger<?php } elseif ($_smarty_tpl->tpl_vars['criticality_id']->value==m_demands::CRITICALITY_HI) {?>warning<?php } else { ?>white<?php }?> pull-right text-right"></span>
                    <div class="clearfix"></div>
                </a>
                <a href="demands/create/?demand_data[criticality]=<?php echo $_smarty_tpl->tpl_vars['criticality_id']->value;?>
"><i class="fa fa-plus"></i></a>
            </li>
        <?php } ?>

        
        <li class="divider"></li>
        <li class="add-action">
            <a href="notes/">Заметки</a>
            <a data-toggle="modal" href="#modal-note"><i class="fa fa-plus"></i></a>
        </li>
        <li>
            <a href="todo/">
                <span class="pull-left">Сделать (ToDo)</span>
                <span data-counter="my_todo_not_complete" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="favorites/">
                <span class="pull-left">Избранное</span>
                <span data-counter="my_favorites" class="badge badge-white pull-right text-right"></span>
                <div class="clearfix"></div>
            </a>
        </li>

        
        

    </ul>
</li>
<?php }} ?>
