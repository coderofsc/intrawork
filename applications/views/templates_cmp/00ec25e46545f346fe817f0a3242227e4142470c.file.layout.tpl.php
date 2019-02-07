<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:35:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\types\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273745c5a2bbf9970e4-29956621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00ec25e46545f346fe817f0a3242227e4142470c' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\types\\layout.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
    'd2e5bba4b78ab5ad30c26078c8eb3ad56dd6bbb7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\abstracts\\preview_layout.tpl',
      1 => 1456000724,
      2 => 'file',
    ),
    '6e301cb514e7ddae0d211df2bcc1f93f6ecfd773' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\lists\\next_prev.tpl',
      1 => 1453148944,
      2 => 'file',
    ),
    'af2ebaed2e0f9c60b52795fd217d86b4f0527976' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\attached_table.tpl',
      1 => 1454920038,
      2 => 'file',
    ),
    'c50a40ac99f115de943fc243eedc18172bc628cc' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\comments\\form.tpl',
      1 => 1454924966,
      2 => 'file',
    ),
    '54bff1e8bb2e8bd968b79c4aa82b768913116655' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\comments\\pane_toggler.tpl',
      1 => 1454682514,
      2 => 'file',
    ),
    '7403379474f05ca34ddd23f069fcf07141bda3c1' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\comments\\pane.tpl',
      1 => 1454682874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273745c5a2bbf9970e4-29956621',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'layout_path' => 0,
    'layout_name' => 0,
    'conditions' => 0,
    'sort' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2bbfc4e685_26877575',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2bbfc4e685_26877575')) {function content_5c5a2bbfc4e685_26877575($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.replace.php';
if (!is_callable('smarty_modifier_http_build_query')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><?php $_smarty_tpl->tpl_vars["layout_name"] = new Smarty_variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'],"/","-"), null, 0);?>
<?php $_smarty_tpl->tpl_vars["layout_path"] = new Smarty_variable($_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'], null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['controller_info']->value['pane']) {?>

    <div class="ui-layout-center animated fadeInDown">

        <div class="ui-layout-content jscroll-pager">
            <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['layout_path']->value)."/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>

        <div class="ui-pane-footer" id="<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-pager" style="padding:5px; background-color: #f2f1ef">
                <div class="pull-left" style="width:220px;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm btn-page-prev"> <i class="fa fa-angle-double-left"></i> </button>
                        </span>
                        <span class="input-group-addon">Стр.</span>
                        <input type="text" class="form-control text-center input-sm current-page" value="1"  />
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-page-search" type="button"><i class="fa fa-search"></i></button>
                        </span>
                        <span class="input-group-addon">из <span class="max-page"><?php echo ceil($_smarty_tpl->tpl_vars['controller_info']->value['total']/30);?>
</span></span>
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm btn-page-next"> <i class="fa fa-angle-double-right"></i> </button>
                        </span>
                   </div>
                </div>
                <div class="pull-right text-center" style="width:60px">
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm btn-cmp-prev"> <i class="fa fa-angle-left"></i> </button>
                        <button class="btn btn-default btn-sm btn-cmp-next"> <i class="fa fa-angle-right"></i> </button>
                    </div>
                </div>

                
                

            <div class="clearfix"></div>
            </div>

    </div>

    
        <?php $_smarty_tpl->_capture_stack[0][] = array('content', null, null); ob_start(); ?>
            <div class="ui-pane-header ui-pane-header-pager" style="display: none"><?php /*  Call merged included template "helpers/lists/next_prev.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/lists/next_prev.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('np_calc'=>true), 0, '273745c5a2bbf9970e4-29956621');
content_5c5a2bbfa5e496_67881552($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/lists/next_prev.tpl" */?></div>
            <div class="ui-layout-content preview-container cm-container"></div>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

        <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']['comments']) {?>
            <div class="ui-layout-east">
                <div class="ui-layout-center layout-preview bg-muted" id="<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane">
                    <?php echo Smarty::$_smarty_vars['capture']['content'];?>

                </div>

                <?php /*  Call merged included template "comments/pane.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("comments/pane.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '273745c5a2bbf9970e4-29956621');
content_5c5a2bbfafe733_10489728($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "comments/pane.tpl" */?>
            </div>
        <?php } else { ?>
            <div class="ui-layout-east layout-preview bg-muted" id="<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane">
                <?php echo Smarty::$_smarty_vars['capture']['content'];?>

            </div>
        <?php }?>

    

    <?php echo '<script'; ?>
>
        $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-table").jcatcher({
            source	: "<?php echo $_smarty_tpl->tpl_vars['layout_path']->value;?>
/view/%DATA_ID%/?render=<?php echo @constant('RENDER_JSON');?>
&pane=0<?php if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['group']->value,"group");
}?>",
            wrap	: "<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane",
            empty   : "<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['name'];?>
 <?php echo L::text_not_selected_plural;?>
",
            morph   : ["<?php echo implode($_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'],'","');?>
"],

            $paging: $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-pager"),
            conditions: '<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['group']->value,"group");?>
',


            callback_begin     : function(selected_id, selected_e) {
                document.title = 'Загрузка...';
                $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane").find(".ui-pane-header-pager:visible").hide();

                <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']['comments']) {?>
                    commentsIW.hide_toggler();
                <?php }?>

                
                
            },

            callback_end: function(data_id, response, e) {

                $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane").find(".ui-pane-header-pager:hidden").show();
                // В next_prev.tpl
                if(typeof np_calc == 'function') {
                    np_calc(data_id);
                }

                <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']['comments']) {?>
                    commentsIW.set_owner(data_id);
                    commentsIW.show_toggler();
                <?php }?>

                
                
            },

            callback_empty: function() {
                $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane").find(".ui-pane-header-pager:visible").hide();
                <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']['comments']) {?>
                    commentsIW.hide_toggler();
                <?php }?>

                
                
            },

            callback_complete: function(selected_id, response, selected_e) {
                document.title = decode_entities($("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane").find(".title").html().replace(/<[^>]+>/g,''));
                $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane").find(".page-heading .delete-record").on("click", function(e) {
                    e.stopPropagation();
                    $(selected_e).find(".btn-group a.delete-record").click();
                    return false;
                });

                $("body").trigger("previewLoaded.content");
                $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-view-pane").find(".ui-layout-content").scrollTo(0, 800);
                
                
            }
        });
    <?php echo '</script'; ?>
>
<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['layout_name']->value)."/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php echo '<script'; ?>
>

    
    

    $('body').bind('init.layout', function(event){
        $('.jscroll-pager').jscroll({
            autoTrigger: false,
            $paging: $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-pager"),
            replace: true,
            page_url_template: '<?php echo $_smarty_tpl->tpl_vars['layout_path']->value;?>
/?render=4&page=%PAGE%&continue=true&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['sort']->value) {?>&<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
'
        });

        /*var selected = $.cookie('jcatcher-selected');
        if (selected != undefined) {
            DemandIW.find(selected, "<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
", null);
        }*/
    });


    $("#prev-next-nav").find(".previous:not(:disabled)").on("click", function(){
        if (!$("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-table").jcatcher.prev()) {
            $(this).addClass("disabled");
            toastr.info('Достигнуто начало списка', 'Переход на предыдущую запись');
        }
        return false;
    });

    $("#prev-next-nav").find(".next:not(:disabled)").on("click", function(){
        if (!$("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-table").jcatcher.next()) {
            $(this).addClass("disabled");
            toastr.info('Достигнут конец списка', 'Переход на следующую запись');
        }
        return false;
    });

    $("#<?php echo $_smarty_tpl->tpl_vars['layout_name']->value;?>
-table").closest(".jscroll-pager").on("jscroll-after-append", function(event, args) {
        
    CoreIW.init_donuts(args.context);

    });
<?php echo '</script'; ?>
>


<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:35:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\lists\next_prev.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2bbfa5e496_67881552')) {function content_5c5a2bbfa5e496_67881552($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
if (!is_callable('smarty_modifier_http_build_query')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?><ul class="pager clamped list-inline " id="prev-next-nav" style="font-size:13px;">
    <li class="previous disabled"><a href="#">&larr; Назад</a></li>
    <li class="hidden-xs">
        <?php echo smarty_modifier_mb_ucfirst($_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'][0]);?>

    </li>
    <li>
        <span class="rownum">0</span> из <a href="<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/<?php if ($_smarty_tpl->tpl_vars['conditions']->value) {?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php } else { ?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
"><span class="total">0</span></a>
        
    </li>
    <li class="next disabled"><a href="#">Вперед &rarr;</a></li>
</ul>
<div class="clearfix"></div>

<?php if ($_smarty_tpl->tpl_vars['np_calc']->value) {?>
<?php echo '<script'; ?>
>

    $("#prev-next-nav").on("click", ".previous.disabled a, .next.disabled a", function() { return false; });

    function np_calc(id) {
        $("#prev-next-nav").find(".rownum").html('<i class="fa fa-spinner fa-spin"></i>');
        $("#prev-next-nav").find(".total").html('<i class="fa fa-spinner fa-spin"></i>');
        $("#prev-next-nav").find(".previous").addClass("disabled");
        $("#prev-next-nav").find(".next").addClass("disabled");

        var query = "<?php if ($_smarty_tpl->tpl_vars['conditions']->value) {?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php } else { ?>?<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['group']->value,"group");?>
";
        $.ajax({
            url: "/<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/view/"+id+"/get_next_prev_id/",
            dataType: 'json',
            method: 'get',
            data: "<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }
echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['sort']->value,"sort");?>
&<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['group']->value,"group");?>
",
            success: function (response) {
                if (response.status == 200) {

                    if (response.data.prev) {
                        $("#prev-next-nav").find(".previous").removeClass("disabled").children("a").attr("href", "<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/view/"+response.data.prev+"/"+query);
                    }

                    if (response.data.next) {
                        $("#prev-next-nav").find(".next").removeClass("disabled").children("a").attr("href", "<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/view/"+response.data.next+"/"+query);
                    }

                    $("#prev-next-nav").find(".rownum").html(response.data.rownum);
                    $("#prev-next-nav").find(".total").html(response.data.total);

                } else {
                    toastr.error("Ошибка получения позиции компании в списке", "Позиция");

                }
            }
        });
    }

    <?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
    $(document).ready(function() {
        np_calc(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);
    });
    <?php }?>

<?php echo '</script'; ?>
>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:35:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\comments\pane.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2bbfafe733_10489728')) {function content_5c5a2bbfafe733_10489728($_smarty_tpl) {?><form id="comment-form">
    <div class="ui-layout-south pane-content-sm" id="comment-form-pane">
        <?php /*  Call merged included template "./form.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '273745c5a2bbf9970e4-29956621');
content_5c5a2bbfb06433_42418135($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./form.tpl" */?>
    </div>
</form>

<?php /*  Call merged included template "./pane_toggler.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./pane_toggler.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '273745c5a2bbf9970e4-29956621');
content_5c5a2bbfb390c3_33730839($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./pane_toggler.tpl" */?>

<?php echo '<script'; ?>
 src="resources/js/intrawork.comments.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {
        commentsIW.init('<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
', <?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module_id'];?>
, <?php echo intval($_smarty_tpl->tpl_vars['owner_id']->value);?>
);
    });
<?php echo '</script'; ?>
>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:35:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\comments\form.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2bbfb06433_42418135')) {function content_5c5a2bbfb06433_42418135($_smarty_tpl) {?>

<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#form" data-toggle="tab"><?php echo L::tabs_message;?>
</a></li>
        <li><a href="#attach" data-toggle="tab"><?php echo L::tabs_files;?>
</a></li>
        <li class="pull-right">
            <button class="btn btn-default btn-sm btn-comment-pane-toggler pull-right">
                <i class="fa fa-times"></i><span class="hidden-xs"> <?php echo L::text_close;?>
</span>
            </button>
        </li>
    </ul>
</div>

<div class="ui-layout-content">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane active" id="form">
                <textarea name="comment_data[text]" style="border:0px; height: 99%; width:100%" placeholder="Нажмите CTRL+Enter отправки сообщения"></textarea>
            </div>
            <div class="tab-pane" id="attach">
                <?php /*  Call merged included template "helpers/attached_table.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/attached_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '273745c5a2bbf9970e4-29956621');
content_5c5a2bbfb15e35_21589326($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/attached_table.tpl" */?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="space space-xs"></div>

    <div class="form-inline row">
        <div class="form-group  col-sm-12">
            <button type="submit" class="btn btn-primary" data-loading-text="Отправка, ждите..."><i class="fa fa-send"></i> Отправить</button>
        </div>

    </div>

</div>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:35:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\attached_table.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2bbfb15e35_21589326')) {function content_5c5a2bbfb15e35_21589326($_smarty_tpl) {?><table id="attach_files" role="presentation" class="table table-striped <?php if (!$_smarty_tpl->tpl_vars['tender_data']->value['attach_files']) {?>hidden<?php }?>">
    
</table>

<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
		<span class="btn btn-default fileinput-button" id="fileinput-button">
			<span><?php echo L::text_add_files;?>
</span>
			<input id="fileupload" type="file" name="file" multiple="" data-url="<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
/create/attach/">
		</span>
        
    </div>
    <div class="col-sm-8 hidden" id="progress-upload">
        <div id="progress-upload-files" class="progress progress-striped active">
            <div class="progress-bar progress-bar-success"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
        </div>
        <div id="progress-upload-files-status">Загружено: 0 / 0</div>
    </div>
</div>





<?php echo '<script'; ?>
 src="min/?g=fileuploadjs"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/fileupload/js/jquery.client.js"><?php echo '</script'; ?>
>
<link href="min/?g=fileuploadcss" type="text/css" rel="stylesheet" />

<?php echo '<script'; ?>
>

<?php echo '</script'; ?>
>


<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:35:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\comments\pane_toggler.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2bbfb390c3_33730839')) {function content_5c5a2bbfb390c3_33730839($_smarty_tpl) {?><button id="btn-comment-pane-toggler" class="btn btn-success btn-xs btn-comment-pane-toggler">Добавить комментарий</button>

<style>
    #btn-comment-pane-toggler {
        position: absolute; z-index:5; left:50%;
        margin-left:-75px;
        width:150px;
        bottom:0;
        /*-webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;*/
        border-radius: 0;
    }
</style>
<?php }} ?>
