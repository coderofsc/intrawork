<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:39:08
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\search\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159105c5a3abc975b52-88223588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f411a47554c45eff1cb954204ecae49e32aeb531' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\search\\list.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159105c5a3abc975b52-88223588',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_data' => 0,
    'old_type' => 0,
    'object' => 0,
    'offset' => 0,
    'limit' => 0,
    'conditions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3abcad9324_42954775',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3abcad9324_42954775')) {function content_5c5a3abcad9324_42954775($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><style>
    .search-result .extra {
        width:64px; height:64px;
        text-align: center;
        margin-right:15px;
        float:left;
    }
</style>

<?php if ($_smarty_tpl->tpl_vars['search_data']->value['result']) {?>
<table class="table table-search clamped-margin-bottom">
    <?php $_smarty_tpl->tpl_vars["old_type"] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['object'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['object']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['search_data']->value['result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['object']->key => $_smarty_tpl->tpl_vars['object']->value) {
$_smarty_tpl->tpl_vars['object']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['old_type']->value!=$_smarty_tpl->tpl_vars['object']->value['object_type']) {?>
            <tr>
                <td>
                    <h4>
                        <?php if ($_smarty_tpl->tpl_vars['object']->value['object_type']==@constant('OWNER_USER')) {?>
                            <?php echo L::modules_users_name;?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['object']->value['object_type']==@constant('OWNER_CONTACT')) {?>
                            <?php echo L::modules_contacts_name;?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['object']->value['object_type']==@constant('OWNER_DEMAND')) {?>
                            <?php echo L::modules_demands_name;?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['object']->value['object_type']==@constant('OWNER_NEWS')) {?>
                            <?php echo L::modules_news_name;?>

                        <?php }?>
                    </h4>
                </td>
            </tr>
            <?php $_smarty_tpl->tpl_vars["old_type"] = new Smarty_variable($_smarty_tpl->tpl_vars['object']->value['object_type'], null, 0);?>
        <?php }?>
        <tr>
            <td>
                <div class="search-result media">
                <?php if ($_smarty_tpl->tpl_vars['object']->value['object_type']==@constant('OWNER_USER')) {?>
                        <a class="extra" href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
">
                            <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['object']->value['extra_data'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS'),'size'=>"sm",'responsive'=>true), 0);?>

                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['object']->value['title'];?>
</a></h4>
                            <a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
" class="text-muted search-link"><?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
</a>
                            <p><?php echo trim($_smarty_tpl->tpl_vars['object']->value['description']);?>
</p>
                        </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['object']->value['object_type']==@constant('OWNER_CONTACT')) {?>
                    <a class="extra" href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
">
                        <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['object']->value['extra_data'],'dir'=>@constant('STORAGE_DIR_AVATARS_CONTACTS'),'size'=>"sm",'responsive'=>true), 0);?>

                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['object']->value['title'];?>
</a></h4>
                        <a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
" class="text-muted search-link"><?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
</a>
                        <p><?php echo trim($_smarty_tpl->tpl_vars['object']->value['description']);?>
</p>
                    </div>

                <?php } elseif ($_smarty_tpl->tpl_vars['object']->value['object_type']==@constant('OWNER_DEMAND')) {?>
                    <div class="extra">
                        <i class="fa fa-lg text-<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['object']->value['extra_data']]['color'];?>
 fa-<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['object']->value['extra_data']]['icon'];?>
" title="<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['object']->value['extra_data']]['name'];?>
"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['object']->value['title'];?>
</a></h4>
                        <a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
" class="text-muted search-link"><?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
</a>
                        <p><?php echo trim($_smarty_tpl->tpl_vars['object']->value['description']);?>
</p>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['object']->value['object_type']==@constant('OWNER_NEWS')) {?>
                    <a class="extra" href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
">
                        <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['object']->value['extra_data'],'dir'=>@constant('STORAGE_DIR_AVATARS_CONTACTS'),'size'=>"sm",'responsive'=>true), 0);?>

                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['object']->value['title'];?>
</a></h4>
                        <a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
" class="text-muted search-link"><?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['object']->value['link'];?>
</a>
                        <p><?php echo trim($_smarty_tpl->tpl_vars['object']->value['description']);?>
</p>
                    </div>

                <?php }?>
                </div>
            </td>
        </tr>

    <?php } ?>
</table>

<ul class="pager">
    <li><a href="search/?render=<?php echo @constant('RENDER_JSON');?>
&offset=<?php echo $_smarty_tpl->tpl_vars['offset']->value+$_smarty_tpl->tpl_vars['limit']->value;?>
&continue=true&text=<?php echo $_smarty_tpl->tpl_vars['search_data']->value['text'];?>
&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");?>
"><?php echo L::text_load_more;?>
</a></li>
</ul>
<?php }?><?php }} ?>
