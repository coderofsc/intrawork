<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\sidebar\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2555991b6396f1e23-02731200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18d65e21f3adda21edac124b366ab34c5d5eaf69' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\sidebar\\wrap.tpl',
      1 => 1451001864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2555991b6396f1e23-02731200',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cuser_data' => 0,
    'conditions_decode' => 0,
    'conditions' => 0,
    'ar_quick_filters' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6397878b1_03184345',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6397878b1_03184345')) {function content_5991b6397878b1_03184345($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars["nested"] = new Smarty_variable(0, null, 0);?>

<nav id="sidebar-nav">

    <div class="nav-header">
        <div class="dropdown profile-element">

            <div>
                <a href="users/view/<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['id'];?>
/">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('size'=>"sm",'hash'=>$_smarty_tpl->tpl_vars['cuser_data']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS'),'id'=>$_smarty_tpl->tpl_vars['cuser_data']->value['id']), 0);?>

                </a>
            </div>
            <div class="space space-xs"></div>


            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="block"> <strong><?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['fi'];?>
</strong> <b class="caret"></b></span>
                <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['post_id']||$_smarty_tpl->tpl_vars['cuser_data']->value['dprt_id']) {?><span class="text-muted block small text-ellipsis"><?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['dprt_name']) {
echo $_smarty_tpl->tpl_vars['cuser_data']->value['dprt_name'];
}
if ($_smarty_tpl->tpl_vars['cuser_data']->value['post_name']&&$_smarty_tpl->tpl_vars['cuser_data']->value['dprt_name']) {?>&nbsp;/&nbsp;<?php }
echo $_smarty_tpl->tpl_vars['cuser_data']->value['post_name'];?>
</span><?php }?>
            </a>
            <ul class="dropdown-menu bullet pull-center">
                <li>
                    <a href="users/view/<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['id'];?>
/">
                        <?php echo L::navbar_profile_dd_profile;?>

                    </a>
                </li>
                <li>
                    <a href="users/edit/<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['id'];?>
/">
                        <?php echo L::navbar_profile_dd_edit_profile;?>

                    </a>
                </li>
                
                <li role="presentation" class="divider"></li>
                <li>
                    <a href="logout/">
                        <i class="fa fa-sign-out fa-fw"></i> <?php echo L::navbar_profile_dd_exit;?>

                    </a>
                </li>
            </ul>
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['conditions_decode']->value&&$_smarty_tpl->tpl_vars['conditions']->value) {?>
        <div id="sidebar-block-conditions">
        <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/block_conditions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['ar_quick_filters']->value) {?>
        <div id="sidebar-block-quick-filters">
            <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/block_quick_filters.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    <?php }?>

    <div id="sidebar-block-demands-member">
        <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/block_demands_member.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>

    <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_filters']) {?>
    <div id="sidebar-block-filter">
        <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/block_demands_filters.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_favorite']) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/block_demands_favorite.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>

    

    <div id="sidebar-block-categories">
        <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/block_categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>

</nav>


	<?php echo '<script'; ?>
>
		$('#sidebar-nav').find('.btn-toggle').click(function (e) {
            e.preventDefault();
            var $li = $(this).closest('li');
            var $fa = $(this).find('i.fa');


            if ($li.hasClass('open')) {

                $fa.toggleClass("open");
                $li.children('ul').slideToggle(300, function() {
                    $li.removeClass('open');
                    save_node_state($li);
                    //$fa.removeClass('fa-caret-up').addClass('fa-caret-down');

                });
            } else {
                $li.addClass('open');
                $fa.toggleClass("open");
                save_node_state($li);
                $li.children('ul').hide().slideToggle(300, function() {
                    //$fa.removeClass('fa-caret-down').addClass('fa-caret-up');
                });
            }

            function save_node_state($li) {
                if ($li.data("id")) {
                    var sidebarBlockOpen = $.cookie("sidebarBlockOpen");
                    var nodes = (sidebarBlockOpen)?sidebarBlockOpen.split(","):[];

                    if ($li.hasClass('open')) {
                        nodes.push($li.data("id"));
                    } else {
                        nodes.splice( $.inArray($li.data("id"), nodes), 1 );
                        console.log($.inArray($li.data("id"), nodes), $li.data("id"), nodes);
                    }

                    if (nodes.length > 0) {
                        $.cookie("sidebarBlockOpen", nodes.join(","), { path: '/' });
                    } else {
                        $.removeCookie("sidebarBlockOpen", { path: '/' });
                    }
                }
            }

            return false;
		});
	<?php echo '</script'; ?>
>



<?php }} ?>
