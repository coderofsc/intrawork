<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:39:08
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\search\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34575c5a3abc854a19-32547699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d850b17d499170d75ec888e6e36416af2964266' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\search\\layout.tpl',
      1 => 1449698958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34575c5a3abc854a19-32547699',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3abc946d56_70134181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3abc946d56_70134181')) {function content_5c5a3abc946d56_70134181($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_declension')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.declension.php';
?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<style>
    span.ss {
        background-color: lightyellow;
        color: #333;
    }

    h4 a span.ss {
        color: inherit;
    }

    table.table-search tbody tr td {
        border:0;
        border-bottom: 1px dashed #e7eaec;
    }
</style>
<div class="container-fluid">

    <h3 class="clamped-margin-top">
        <?php echo L::modules_search_text_search_result;
if ($_smarty_tpl->tpl_vars['search_data']->value['text']) {?> : &laquo;<?php echo $_smarty_tpl->tpl_vars['search_data']->value['text'];?>
&raquo;<?php }?>
    </h3>
    <small><?php echo L::modules_search_text_query_time;?>
 (<?php echo round($_smarty_tpl->tpl_vars['search_data']->value['time'],3);?>
 <?php echo smarty_modifier_declension(round($_smarty_tpl->tpl_vars['search_data']->value['time']),(((((L::dates_sec_morph_one).(";")).(L::dates_sec_morph_two)).(";")).(L::dates_sec_morph_five)));?>
)</small>

    <div class="search-form">
        <form action="search/" method="get">
            <div class="input-group">
                <input value="<?php echo $_smarty_tpl->tpl_vars['search_data']->value['text'];?>
" name="text" class="form-control input-lg" type="text" />
                <div class="input-group-btn">
                    <button class="btn btn-lg btn-primary" type="submit">
                        <?php echo L::actions_search;?>

                    </button>
                </div>
            </div>
            <div class="checkbox ">
                <label>
                    <input type="checkbox" <?php if (in_array(@constant('OWNER_USER'),$_smarty_tpl->tpl_vars['search_data']->value['sources'])) {?>checked<?php }?> name="sources[]" value="<?php echo @constant('OWNER_USER');?>
"> <?php echo L::modules_users_name;?>

                </label>
                <label>
                    <input type="checkbox" <?php if (in_array(@constant('OWNER_CONTACT'),$_smarty_tpl->tpl_vars['search_data']->value['sources'])) {?>checked<?php }?> name="sources[]" value="<?php echo @constant('OWNER_CONTACT');?>
"> <?php echo L::modules_contacts_name;?>

                </label>
                <label>
                    <input type="checkbox" <?php if (in_array(@constant('OWNER_DEMAND'),$_smarty_tpl->tpl_vars['search_data']->value['sources'])) {?>checked<?php }?> name="sources[]" value="<?php echo @constant('OWNER_DEMAND');?>
"> <?php echo L::modules_demands_name;?>

                </label>
                <label>
                    <input type="checkbox" <?php if (in_array(@constant('OWNER_NEWS'),$_smarty_tpl->tpl_vars['search_data']->value['sources'])) {?>checked<?php }?> name="sources[]" value="<?php echo @constant('OWNER_NEWS');?>
"> <?php echo L::modules_news_name;?>

                </label>
            </div>

        </form>
    </div>

    <div class="space"></div>

    <?php if ($_smarty_tpl->tpl_vars['search_data']->value['result']) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("search/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } else { ?>
        <div class="alert alert-default"><?php echo L::text_nothing_found;?>
</div>
    <?php }?>

</div>



<?php }} ?>
