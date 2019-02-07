<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\view\navbar_actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25245991b6cedc0276-28142930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8cc45f2a846fc39834094b5f3fee0a2a45b6753' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\view\\navbar_actions.tpl',
      1 => 1450905962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25245991b6cedc0276-28142930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
    'ar_type_current_ts' => 0,
    'status_id' => 0,
    'status' => 0,
    'cuser_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6cee19416_45229445',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6cee19416_45229445')) {function content_5991b6cee19416_45229445($_smarty_tpl) {?><nav class="navbar navbar-more navbar-inside clamped border-bottom bg-<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['demand_data']->value['status']]['color'];?>
" role="navigation">
	<div class="container-fluid ">
		<div>
			<ul class="nav navbar-nav navbar-left navbar-statuses">
                
                <?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_smarty_tpl->tpl_vars['status_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_type_current_ts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
 $_smarty_tpl->tpl_vars['status_id']->value = $_smarty_tpl->tpl_vars['status']->key;
?>
                    <li <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['status']==$_smarty_tpl->tpl_vars['status_id']->value) {?>class="active bg-<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['status_id']->value]['color'];?>
"<?php }?>>
                        
                        <a data-color="<?php echo $_smarty_tpl->tpl_vars['status']->value['color'];?>
" <?php if (($_smarty_tpl->tpl_vars['status_id']->value==m_demands::STATUS_WORK)&&!$_smarty_tpl->tpl_vars['demand_data']->value['required_time']) {?>class="tuning" data-remote="demands/tuning/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['id'];?>
/?demand_data[status]=<?php echo $_smarty_tpl->tpl_vars['status_id']->value;
if (!$_smarty_tpl->tpl_vars['demand_data']->value['eu_eid']) {?>&demand_data[eu_eid]=<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['eid'];
}?>" href="#modal-remote" data-toggle="modal" class="tuning"<?php } else { ?>href="#"<?php }?> data-status="<?php echo $_smarty_tpl->tpl_vars['status_id']->value;?>
" >
                            <i class="fa fa-fw fa-<?php echo $_smarty_tpl->tpl_vars['status']->value['icon'];?>
"></i> <span><?php echo $_smarty_tpl->tpl_vars['status']->value['name'];?>
</span>
                        </a>
                    </li>
                <?php } ?>

			</ul>
            
		</div>
	</div>
</nav>


<?php }} ?>
