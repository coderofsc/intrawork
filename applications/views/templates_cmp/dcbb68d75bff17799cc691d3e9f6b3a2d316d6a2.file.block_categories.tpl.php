<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\sidebar\block_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157615991b639a5c8c5-14387161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcbb68d75bff17799cc691d3e9f6b3a2d316d6a2' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\sidebar\\block_categories.tpl',
      1 => 1457396550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157615991b639a5c8c5-14387161',
  'function' => 
  array (
    'category_level' => 
    array (
      'parameter' => 
      array (
        'nested' => 0,
        'ar_tree' => 
        array (
        ),
        'open' => false,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'nested' => 0,
    'controller_name' => 0,
    'cur_category' => 0,
    'ar_tree' => 0,
    'category_id' => 0,
    'open' => 0,
    'category' => 0,
    'cuser_data' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b639b82992_11102286',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b639b82992_11102286')) {function content_5991b639b82992_11102286($_smarty_tpl) {?><?php if (!function_exists('smarty_template_function_category_level')) {
    function smarty_template_function_category_level($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['category_level']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <ul class="sidebar-block">

        <?php if (!$_smarty_tpl->tpl_vars['nested']->value) {?>
            <li <?php if ($_smarty_tpl->tpl_vars['controller_name']->value=="demands"&&!$_smarty_tpl->tpl_vars['cur_category']->value) {?>class="active"<?php }?>>
                <div class="row">
                    <a href="demands/" class="col-sm-12 cat-item cat-readonly">
                        <i class="fa fa-fw fa-circle" ></i>
                        <span class="nav-label">Все категории</span>
                    </a>
                </div>
            </li>
        <?php }?>

        <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_smarty_tpl->tpl_vars['category_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_tree']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
 $_smarty_tpl->tpl_vars['category_id']->value = $_smarty_tpl->tpl_vars['category']->key;
?>
            <?php if (($_COOKIE['sidebarBlockOpen']&&in_array($_smarty_tpl->tpl_vars['category_id']->value,explode(",",$_COOKIE['sidebarBlockOpen'])))||($_smarty_tpl->tpl_vars['cur_category']->value&&(($_smarty_tpl->tpl_vars['cur_category']->value['ar_children']&&in_array($_smarty_tpl->tpl_vars['category_id']->value,$_smarty_tpl->tpl_vars['cur_category']->value['ar_children']))||in_array($_smarty_tpl->tpl_vars['category_id']->value,$_smarty_tpl->tpl_vars['cur_category']->value['ar_parents'])||$_smarty_tpl->tpl_vars['cur_category']->value['id']==$_smarty_tpl->tpl_vars['category_id']->value))) {?>
                <?php $_smarty_tpl->tpl_vars["open"] = new Smarty_variable(true, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["open"] = new Smarty_variable(false, null, 0);?>
            <?php }?>
            <li data-id="<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['cur_category']->value&&$_smarty_tpl->tpl_vars['cur_category']->value['id']==$_smarty_tpl->tpl_vars['category_id']->value) {?>active<?php }
if ($_smarty_tpl->tpl_vars['open']->value) {?> open<?php }?>">

                <div class="row" <?php if ($_smarty_tpl->tpl_vars['category']->value['visible_only']) {?>title="Недоступная категория" <?php }?>>
                    <div class="col-sm-9" <?php if ($_smarty_tpl->tpl_vars['nested']->value) {?>style="padding-left: <?php echo (15+$_smarty_tpl->tpl_vars['nested']->value*15);?>
px;"<?php }?>>
                        <a class="text-ellipsis cat-item <?php if ($_smarty_tpl->tpl_vars['category']->value['visible_only']||!($_smarty_tpl->tpl_vars['cuser_data']->value['crud_categories'][$_smarty_tpl->tpl_vars['category_id']->value]&m_roles::CRUD_C)) {?>cat-readonly<?php }?> <?php if ($_smarty_tpl->tpl_vars['category']->value['visible_only']) {?>path-only<?php }?>" href="demands/?cnd[cat_id]=<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;?>
" >
                            <i class="fa fa-fw <?php if ($_smarty_tpl->tpl_vars['category']->value['icon']) {
echo $_smarty_tpl->tpl_vars['category']->value['icon'];
} else { ?>fa-circle<?php }?>" <?php if ($_smarty_tpl->tpl_vars['category']->value['bgcolor']) {?>style="color: <?php echo $_smarty_tpl->tpl_vars['category']->value['bgcolor'];?>
"<?php }?>></i>
                            <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</span>
                        </a>
                    </div>

                    <a data-id="<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" href="demands/?cnd[cat_id]=<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
&cnd[status][]=<?php echo m_demands::STATUS_NEW;?>
&cnd[status][]=<?php echo m_demands::STATUS_WORK;?>
&cnd[status][]=<?php echo m_demands::STATUS_PAUSE;?>
" class="col-sm-2 text-center cat-dmd-count <?php if (!$_smarty_tpl->tpl_vars['category']->value['active_demands_count']) {?>hidden<?php }?>">
                        <span class="badge badge-count"><?php echo $_smarty_tpl->tpl_vars['category']->value['active_demands_count'];?>
</span>
                    </a>

                    <?php if ($_smarty_tpl->tpl_vars['category']->value['children']) {?>
                        <div class="col-sm-1 btn-toggle">
                            <i class="fa fa-fw fa-caret-down <?php if ($_smarty_tpl->tpl_vars['open']->value) {?>open<?php }?>"></i>
                        </div>
                    <?php } else { ?>
                        <div class="col-sm-1"></div>
                    <?php }?>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['category']->value['children']) {?>
                    <?php smarty_template_function_category_level($_smarty_tpl,array('nested'=>$_smarty_tpl->tpl_vars['nested']->value+1,'ar_tree'=>$_smarty_tpl->tpl_vars['category']->value['children'],'open'=>$_smarty_tpl->tpl_vars['open']->value));?>

                <?php }?>

                
            </li>
        <?php } ?>
    </ul>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<?php smarty_template_function_category_level($_smarty_tpl,array('ar_tree'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_tree_categories']));?>


<?php }} ?>
