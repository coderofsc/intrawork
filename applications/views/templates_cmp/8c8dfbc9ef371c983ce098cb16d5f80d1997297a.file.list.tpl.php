<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:52
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16925991b638df1108-92374346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c8dfbc9ef371c983ce098cb16d5f80d1997297a' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\list.tpl',
      1 => 1453151022,
      2 => 'file',
    ),
    '934dc6106a7154af41384b5751b14b9d4b649175' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\abstracts\\list.tpl',
      1 => 1450953104,
      2 => 'file',
    ),
    '3b08ce24aab752be17eba7c7c6ffdd77d2820a0b' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\storage_url.tpl',
      1 => 1454590132,
      2 => 'file',
    ),
    '12a837e7c7cf9c87f646f4778fad0521daba57e4' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\avatar.tpl',
      1 => 1452225012,
      2 => 'file',
    ),
    '22799ba8fdaab74bebf13fbd9b81fd3180662f85' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\catpath.tpl',
      1 => 1439336164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16925991b638df1108-92374346',
  'function' => 
  array (
    'get_name' => 
    array (
      'parameter' => 
      array (
        'id' => 0,
        'link' => false,
        'nosmall' => false,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'module_id' => 0,
    'controller_info' => 0,
    'module_name' => 0,
    'ar_data' => 0,
    'prev_group_value' => 0,
    'item' => 0,
    'item_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b63929ad75_26381825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b63929ad75_26381825')) {function content_5991b63929ad75_26381825($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.replace.php';
if (!is_callable('smarty_modifier_http_build_query')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.http_build_query.php';
if (!is_callable('smarty_modifier_truncate')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_mb_wordwrap')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\shared.mb_wordwrap.php';
if (!is_callable('smarty_modifier_ts2text')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.ts2text.php';
if (!is_callable('smarty_modifier_ts2hours')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.ts2hours.php';
?>

<?php if (!$_smarty_tpl->tpl_vars['module_id']->value&&$_smarty_tpl->tpl_vars['controller_info']->value['module_id']) {?>
    <?php $_smarty_tpl->tpl_vars["module_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module_id'], null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["module_name"] = new Smarty_variable(smarty_modifier_replace(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'],"/","-"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["module_path"] = new Smarty_variable(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["ar_data"] = new Smarty_variable($_smarty_tpl->tpl_vars['ar_'.(smarty_modifier_replace($_smarty_tpl->tpl_vars['module_name']->value,"-","_"))]->value, null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['ar_data']->value['data']) {?>
    <table id="<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom table-sticky-head footable">
        
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="120px"/>
        <col width="80px"/>
        <col width="120px"/>
        <col width="120px"/>
    </colgroup>


        
    <thead>
    <tr>
        <th></th>
        <th data-toggle="true"></th>
        <th></th>
        <th><?php echo L::forms_labels_title;?>
</th>
        <th class="text-center" data-name="<?php echo L::forms_labels_demands_implement_percent;?>
">%</th>
        <th class="text-center" data-name="<?php echo L::forms_labels_demands_messages;?>
"><i class="fa fa-comments-o"></i></th>
        <th class="text-center" data-hide="<?php if ($_smarty_tpl->tpl_vars['collapsed']->value) {?>all<?php } else { ?>phone<?php }?>"><?php echo L::forms_labels_created_date;?>
</th>
        <th class="text-center" data-hide="<?php if ($_smarty_tpl->tpl_vars['collapsed']->value) {?>all<?php } else { ?>phone<?php }?>"><?php echo L::forms_labels_demands_remain_time;?>
</th>
        <th data-hide="<?php if ($_smarty_tpl->tpl_vars['collapsed']->value) {?>all<?php } else { ?>phone,tablet<?php }?>"><?php echo L::members_customer;?>
</th>
        <th data-hide="<?php if ($_smarty_tpl->tpl_vars['collapsed']->value) {?>all<?php } else { ?>phone,tablet<?php }?>"><?php echo L::members_executor;?>
</th>
    </tr>
    </thead>


        <tbody>
        
            <?php if (isset($_smarty_tpl->tpl_vars['ar_data']->value['limit'])) {?>
            <tr class="warning">
                <td colspan="20" class="text-center">
                    Страница <?php echo intval($_smarty_tpl->tpl_vars['ar_data']->value['offset']/$_smarty_tpl->tpl_vars['ar_data']->value['limit'])+1;?>
 из <?php echo ceil($_smarty_tpl->tpl_vars['ar_data']->value['total']/$_smarty_tpl->tpl_vars['ar_data']->value['limit']);?>

                </td>
            </tr>
            <?php }?>
        

        <?php $_smarty_tpl->tpl_vars["prev_group_value"] = new Smarty_variable("-1", null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['item_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_data']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item_id']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>

            
            <?php if ($_smarty_tpl->tpl_vars['ar_data']->value['group']['by']&&$_smarty_tpl->tpl_vars['ar_data']->value['group']['by']!="none"&&$_smarty_tpl->tpl_vars['prev_group_value']->value!=$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['ar_data']->value['group']['by']]) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("./list_group_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('column'=>$_smarty_tpl->tpl_vars['ar_data']->value['group']['by'],'value'=>$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['ar_data']->value['group']['by']],'data'=>$_smarty_tpl->tpl_vars['item']->value), 0);?>

                <?php $_smarty_tpl->tpl_vars["prev_group_value"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['ar_data']->value['group']['by']], null, 0);?>
            <?php }?>

            
    <tr data-id="<?php echo $_smarty_tpl->tpl_vars['item_id']->value;?>
" data-rownum="<?php echo $_smarty_tpl->tpl_vars['item']->iteration+$_smarty_tpl->tpl_vars['ar_demands']->value['offset'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['item']->value['unix_deadline_date']&&$_smarty_tpl->tpl_vars['item']->value['unix_deadline_date']<time()) {?>danger<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['eu_eid']==$_smarty_tpl->tpl_vars['cuser_data']->value['eid']&&$_smarty_tpl->tpl_vars['item']->value['status']==m_demands::STATUS_WORK) {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['status']==m_demands::STATUS_SPAM) {?>muted<?php }?>">
        <td>
            <?php /*  Call merged included template "helpers/avatar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['item']->value['eu_avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS')), 0, '16925991b638df1108-92374346');
content_5991b639048d79_41475225($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/avatar.tpl" */?>
        </td>
        <td></td>
        <td class="text-center">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['attach_count']) {?><span class="dd-icon text-muted"><i title="Есть вложения" class="fa fa-fw fa-files-o"></i></span> <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id']) {?><span class="dd-icon text-muted"><i title="<?php echo L::modules_demands_text_joined;?>
" class="fa fa-fw fa-share-alt"></i></span> <?php }?>
            <span class="dd-icon icon-ds text-<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['item']->value['status']]['color'];?>
"><i class="fa fa-fw fa-<?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['item']->value['status']]['icon'];?>
" title="Статус заявки: <?php echo m_demands::$ar_status[$_smarty_tpl->tpl_vars['item']->value['status']]['name'];?>
"></i></span>
            <span class="dd-icon icon-cr text-<?php echo m_demands::$ar_criticality[$_smarty_tpl->tpl_vars['item']->value['criticality']]['color'];?>
"><i class="fa fa-fw fa-<?php echo m_demands::$ar_criticality[$_smarty_tpl->tpl_vars['item']->value['criticality']]['icon'];?>
" title="Критичность: <?php echo m_demands::$ar_criticality[$_smarty_tpl->tpl_vars['item']->value['criticality']]['name'];?>
"></i></span>
        </td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['type_id']) {?><label class="label label-<?php echo $_smarty_tpl->tpl_vars['item']->value['type_type'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['type_name'];?>
</label> <?php }?>
            <a class="title" href="demands/view/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/<?php if ($_smarty_tpl->tpl_vars['conditions']->value) {?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php } else { ?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
">
                <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

            </a>
            <div class="small"><?php if (!isset($_smarty_tpl->tpl_vars['ar_demands']->value['conditions']['cat_id'])) {
/*  Call merged included template "helpers/catpath.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/catpath.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('link'=>true,'id'=>$_smarty_tpl->tpl_vars['item']->value['cat_id'],'nosmall'=>true), 0, '16925991b638df1108-92374346');
content_5991b639191e73_86341523($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/catpath.tpl" */
}?></div>
            <div class="small text-muted ww-bw">
                <?php if (trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['item']->value['message']))) {?>
                    <?php echo smarty_mb_wordwrap(smarty_modifier_truncate(trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['item']->value['message']))),36,"\n",1);?>

                <?php }?>
            </div>
        </td>
        <td class="text-center">
            
            <span class="donut" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['percent_complete'];?>
% выполнено" style="line-height: 1"><?php echo $_smarty_tpl->tpl_vars['item']->value['percent_complete'];?>
/100</span>
        </td>
        <td class="text-center">
            <span class="badge badge-white"><?php echo $_smarty_tpl->tpl_vars['item']->value['count_messages'];?>
</span>
        </td>
        <td class="text-center">
            <?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['item']->value['unix_create_date']);?>

        </td>

        <td class="text-center">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['required_time']) {?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['required_time']>$_smarty_tpl->tpl_vars['item']->value['exec_time']) {?>
                    <i class="fa fa-clock-o text-muted"></i> <?php echo smarty_modifier_ts2hours(($_smarty_tpl->tpl_vars['item']->value['required_time']-$_smarty_tpl->tpl_vars['item']->value['exec_time']),false,true);?>

                <?php } else { ?>
                    <div class="text-danger">
                        <i class="fa fa-clock-o"></i> -<?php echo smarty_modifier_ts2hours(($_smarty_tpl->tpl_vars['item']->value['exec_time']-$_smarty_tpl->tpl_vars['item']->value['required_time']),false,true);?>

                    </div>

                <?php }?>
            <?php } else { ?>
                <span class="text-muted">&mdash;</span>
            <?php }?>
        </td>
        <td><?php if ($_smarty_tpl->tpl_vars['item']->value['cu_id']) {
echo $_smarty_tpl->tpl_vars['item']->value['cu_short_fio'];
} else {
echo $_smarty_tpl->tpl_vars['item']->value['cu_email'];
}?></td>
        <td><?php if ($_smarty_tpl->tpl_vars['item']->value['eu_eid']) {
echo $_smarty_tpl->tpl_vars['item']->value['eu_short_fio'];
} else { ?><span class="text-muted">Не указан</span><?php }?></td>
    </tr>



        <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div class="alert alert-default">
        <?php if ($_smarty_tpl->tpl_vars['module_id']->value) {?>
            <?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['name'];?>
 не найдены
        <?php } else { ?>
            <?php echo L::text_nothing_found;?>

        <?php }?>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['module_id']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("helpers/lists/more.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_data'=>$_smarty_tpl->tpl_vars['ar_data']->value,'module_id'=>$_smarty_tpl->tpl_vars['module_id']->value), 0);?>

<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\avatar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5991b639048d79_41475225')) {function content_5991b639048d79_41475225($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['size']->value) {?>
    <?php $_smarty_tpl->tpl_vars["size"] = new Smarty_variable("xs", null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['size']->value=="xs") {?>
    <?php $_smarty_tpl->tpl_vars["size_px"] = new Smarty_variable("32px", null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['size']->value=="sm") {?>
    <?php $_smarty_tpl->tpl_vars["size_px"] = new Smarty_variable("128px", null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["size_px"] = new Smarty_variable("256px", null, 0);?>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['hash']->value) {?>
    <img width="<?php echo $_smarty_tpl->tpl_vars['size_px']->value;?>
" src="<?php /*  Call merged included template "helpers/storage_url.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['hash']->value,'dir'=>$_smarty_tpl->tpl_vars['dir']->value,'ext'=>"jpg",'thumb'=>$_smarty_tpl->tpl_vars['size']->value), 0, '16925991b638df1108-92374346');
content_5991b63908fbe5_38176990($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/storage_url.tpl" */?>" alt="Avatar" class="img-avatar img-circle<?php if ($_smarty_tpl->tpl_vars['responsive']->value) {?> img-responsive<?php }?>" <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>data-user-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"<?php }?>>
<?php } else { ?>
    <img width="<?php echo $_smarty_tpl->tpl_vars['size_px']->value;?>
" src="<?php echo @constant('STORAGE_DIR');
echo $_smarty_tpl->tpl_vars['dir']->value;?>
default_<?php echo $_smarty_tpl->tpl_vars['size']->value;?>
.jpg" alt="Avatar" class="img-avatar img-circle <?php if ($_smarty_tpl->tpl_vars['responsive']->value) {?> img-responsive<?php }?>" <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>data-user-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"<?php }?>>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\storage_url.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5991b63908fbe5_38176990')) {function content_5991b63908fbe5_38176990($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_storage_path')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.storage_path.php';
?><?php echo smarty_modifier_storage_path($_smarty_tpl->tpl_vars['hash']->value,$_smarty_tpl->tpl_vars['dir']->value);
if ($_smarty_tpl->tpl_vars['thumb']->value) {?>thumbs/<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['thumb']->value;
} else {
echo $_smarty_tpl->tpl_vars['hash']->value;
if ($_smarty_tpl->tpl_vars['name']->value) {?>/<?php echo $_smarty_tpl->tpl_vars['name']->value;
}
}?>.<?php if ($_smarty_tpl->tpl_vars['thumb']->value) {?>jpg<?php } else {
echo $_smarty_tpl->tpl_vars['ext']->value;
}?><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:39:53
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\catpath.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5991b639191e73_86341523')) {function content_5991b639191e73_86341523($_smarty_tpl) {?><?php if (!function_exists('smarty_template_function_get_name')) {
    function smarty_template_function_get_name($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['get_name']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if ($_smarty_tpl->tpl_vars['link']->value) {?><a class="catpath" href="demands/?cnd[cat_id]=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php }
echo $_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_line_categories'][$_smarty_tpl->tpl_vars['id']->value]['name'];
if ($_smarty_tpl->tpl_vars['link']->value) {?></a><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_line_categories'][$_smarty_tpl->tpl_vars['id']->value]['parent_id']) {?><span class="text-muted <?php if (!$_smarty_tpl->tpl_vars['nosmall']->value) {?>small<?php }?>"> / <?php smarty_template_function_get_name($_smarty_tpl,array('id'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_line_categories'][$_smarty_tpl->tpl_vars['id']->value]['parent_id'],'link'=>$_smarty_tpl->tpl_vars['link']->value));?>
</span><?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php smarty_template_function_get_name($_smarty_tpl,array('id'=>$_smarty_tpl->tpl_vars['id']->value,'link'=>$_smarty_tpl->tpl_vars['link']->value,'nosmall'=>$_smarty_tpl->tpl_vars['nosmall']->value));?>
<?php }} ?>
