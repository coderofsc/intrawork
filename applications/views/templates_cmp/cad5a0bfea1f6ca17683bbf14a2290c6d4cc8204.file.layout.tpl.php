<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mrooms\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179315c5a2ab93d65f8-51727188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cad5a0bfea1f6ca17683bbf14a2290c6d4cc8204' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mrooms\\layout.tpl',
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
    '5d1646f621593c19a6037d9932414ce3bfeefa53' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\breadcrumb.tpl',
      1 => 1439414720,
      2 => 'file',
    ),
    '0c6233b8d443f21f1b193717275abe29f6fbd1e3' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\lists\\sortgroup.tpl',
      1 => 1449585076,
      2 => 'file',
    ),
    '29c8401e5c6d219eb8e5a00ff6e0223c065d3447' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\alerts.tpl',
      1 => 1437603388,
      2 => 'file',
    ),
    '77ae9595b967279dd3a5adaf5c64c53c350616e9' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\title.tpl',
      1 => 1455627310,
      2 => 'file',
    ),
    'e70c270a93f5c13d1ff04ffe11ad31daa554b5e7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mrooms\\view\\wrap.tpl',
      1 => 1439156342,
      2 => 'file',
    ),
    'a8066ce830c78e47db3507a4623c656761f0c7e7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mrooms\\reservations\\calendar.tpl',
      1 => 1447934390,
      2 => 'file',
    ),
    'cf7088592f157f062c539fda25535f0448f41ed4' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mrooms\\view\\layout.tpl',
      1 => 1433634064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179315c5a2ab93d65f8-51727188',
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
  'unifunc' => 'content_5c5a2ab9b4ca38_30460701',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2ab9b4ca38_30460701')) {function content_5c5a2ab9b4ca38_30460701($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.replace.php';
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

    
    <div class="ui-layout-east" >
        <?php /*  Call merged included template "mrooms/view/layout.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("mrooms/view/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab95e9a70_36394497($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "mrooms/view/layout.tpl" */?>
    </div>


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

                
    current_mroom_id = selected_id;
    document.title = 'Загрузка...';
   $("#reservations-calendar").fullCalendar('refetchEvents');

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
        
        
    });
<?php echo '</script'; ?>
>


<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\lists\next_prev.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab9495ca1_64473975')) {function content_5c5a2ab9495ca1_64473975($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\comments\pane.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab952e245_46230652')) {function content_5c5a2ab952e245_46230652($_smarty_tpl) {?><form id="comment-form">
    <div class="ui-layout-south pane-content-sm" id="comment-form-pane">
        <?php /*  Call merged included template "./form.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab9535f48_67897916($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./form.tpl" */?>
    </div>
</form>

<?php /*  Call merged included template "./pane_toggler.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./pane_toggler.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab95979d0_45253096($_smarty_tpl);
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\comments\form.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab9535f48_67897916')) {function content_5c5a2ab9535f48_67897916($_smarty_tpl) {?>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/attached_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab9568bd8_74112996($_smarty_tpl);
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\attached_table.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab9568bd8_74112996')) {function content_5c5a2ab9568bd8_74112996($_smarty_tpl) {?><table id="attach_files" role="presentation" class="table table-striped <?php if (!$_smarty_tpl->tpl_vars['tender_data']->value['attach_files']) {?>hidden<?php }?>">
    
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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\comments\pane_toggler.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab95979d0_45253096')) {function content_5c5a2ab95979d0_45253096($_smarty_tpl) {?><button id="btn-comment-pane-toggler" class="btn btn-success btn-xs btn-comment-pane-toggler">Добавить комментарий</button>

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
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mrooms\view\layout.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab95e9a70_36394497')) {function content_5c5a2ab95e9a70_36394497($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['controller_info']->value['pane']) {?>
    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value) {?>
        <div class="ui-layout-center animated fadeInDown">
            <div class="preview-container">
                <?php /*  Call merged included template "main/title.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab95f55f5_73765334($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "main/title.tpl" */?>
                <?php /*  Call merged included template "mrooms/view/wrap.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("mrooms/view/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab998f4c2_80319684($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "mrooms/view/wrap.tpl" */?>
            </div>
        </div>
    <?php } else { ?>
        <div class="ui-layout-center layout-preview bg-muted" id="mrooms-view-pane">
            <div class="preview-container cm-container"></div>
        </div>
    <?php }?>


    <div class="ui-layout-south pane-content" >
        <div class="container-fluid">
        <?php /*  Call merged included template "mrooms/reservations/calendar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("mrooms/reservations/calendar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('modal'=>true), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab9a10368_68842210($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "mrooms/reservations/calendar.tpl" */?>
        </div>
    </div>
<?php } else { ?>
    <?php /*  Call merged included template "main/title.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab95f55f5_73765334($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "main/title.tpl" */?>
    <?php /*  Call merged included template "mrooms/view/wrap.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("mrooms/view/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab998f4c2_80319684($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "mrooms/view/wrap.tpl" */?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\title.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab95f55f5_73765334')) {function content_5c5a2ab95f55f5_73765334($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_declension')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.declension.php';
?>


<?php if (@constant('RENDER_MODE')!=@constant('RENDER_MODAL')) {?>
	<div class="container-fluid">
		<div class="page-heading">
            <table class="page-heading-table" width="100%">
                <colgroup>
                    <col width="*" />
                </colgroup>
                <tr>
                    <td>
                        <div class="title">
                            <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['title']) {
echo $_smarty_tpl->tpl_vars['controller_info']->value['title'];
} else {
echo L::text_unknown_controller;?>
!<?php }?>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['total']) {?>
                            <?php $_smarty_tpl->tpl_vars["object_morph"] = new Smarty_variable(implode($_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'],";"), null, 0);?>

                            <div class="small">
                                <?php if ($_smarty_tpl->tpl_vars['conditions']->value) {
echo L::text_found_total_conditions;
} else {
echo L::text_found_total;
}?> &mdash; <?php echo $_smarty_tpl->tpl_vars['controller_info']->value['total'];?>
 <?php echo smarty_modifier_declension($_smarty_tpl->tpl_vars['controller_info']->value['total'],$_smarty_tpl->tpl_vars['object_morph']->value);?>

                            </div>
                        <?php }?>
                    </td>
                    <td class="text-right" nowrap="true" valign="top">
                        <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['actions']) {?>
                            <div class="action-block">
                                <?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_info']->value['actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
                                    <a <?php if ($_smarty_tpl->tpl_vars['action']->value['data']) {
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['action']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['value']->key;
?>data-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"<?php }
}?> <?php if ($_smarty_tpl->tpl_vars['action']->value['modal']) {
if (!$_smarty_tpl->tpl_vars['action']->value['inline']) {?>href="#modal-remote" data-remote="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
"<?php } else { ?>href="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
"<?php }?> data-toggle="modal"<?php } else { ?>href="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
" <?php if ($_smarty_tpl->tpl_vars['action']->value['delete']) {?>data-callback="deleted_record" data-confirm-title="<?php echo L::crud_delete;?>
 <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']) {
echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'][1];
} else {
echo L::text_object_morph_two;
}?>" data-confirm="<?php echo L::confirm_delete_message;?>
"<?php }
}?> class="btn btn-<?php if ($_smarty_tpl->tpl_vars['action']->value['type']) {
echo $_smarty_tpl->tpl_vars['action']->value['type'];
} else { ?>default<?php }?> btn-sm<?php if ($_smarty_tpl->tpl_vars['action']->value['class']) {?> <?php echo $_smarty_tpl->tpl_vars['action']->value['class'];
}
if ($_smarty_tpl->tpl_vars['action']->value['delete']) {?> ajaxcall delete-record<?php }?>" title="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['action']->value['name']);?>
"><?php if ($_smarty_tpl->tpl_vars['action']->value['icon']) {?><i class="fa fa-<?php echo $_smarty_tpl->tpl_vars['action']->value['icon'];?>
"></i> <?php }
echo $_smarty_tpl->tpl_vars['action']->value['name'];?>
</a>
                                <?php } ?>
                            </div>
                        <?php }?>
                    </td>
                </tr>
            </table>
    		<div class="clearfix"></div>
		</div>
	</div>

    <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module_id']) {?>
    <?php echo '<script'; ?>
>
        var module_alias = '<?php echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['alias'];?>
';
        function deleted_record() {
            location.href = module_alias+'/';
        }
    <?php echo '</script'; ?>
>
    <?php }?>

	<?php if ($_smarty_tpl->tpl_vars['breadcrumb']->value!==false) {?>
        <div class="pull-left"><?php /*  Call merged included template "main/breadcrumb.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("main/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab96cc3a4_78433189($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "main/breadcrumb.tpl" */?></div>
	<?php }?>

    <?php /*  Call merged included template "helpers/lists/sortgroup.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/lists/sortgroup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_sort'=>$_smarty_tpl->tpl_vars['controller_info']->value['ar_sort'],'ar_group'=>$_smarty_tpl->tpl_vars['controller_info']->value['ar_group']), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab972de31_79282138($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/lists/sortgroup.tpl" */?>

    


    <div class="clearfix"></div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['system_alerts']->value) {?>
    <div class="container-fluid">
        <?php /*  Call merged included template "helpers/alerts.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("helpers/alerts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '179315c5a2ab93d65f8-51727188');
content_5c5a2ab9885a88_89462881($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "helpers/alerts.tpl" */?>
    </div>
    <div class="space"></div>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\breadcrumb.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab96cc3a4_78433189')) {function content_5c5a2ab96cc3a4_78433189($_smarty_tpl) {?>
<ul class="breadcrumb">
	<li><a href="<?php echo @constant('HOST_ROOT');?>
"><?php echo L::intrawork;?>
</a></li>
	<?php if ($_smarty_tpl->tpl_vars['controller_info']->value['path']) {?>
		<?php  $_smarty_tpl->tpl_vars['crump'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['crump']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_info']->value['path']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['crump']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['crump']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['crump']->key => $_smarty_tpl->tpl_vars['crump']->value) {
$_smarty_tpl->tpl_vars['crump']->_loop = true;
 $_smarty_tpl->tpl_vars['crump']->index++;
?>
            <?php if ($_smarty_tpl->tpl_vars['crump']->total>4&&$_smarty_tpl->tpl_vars['crump']->index==2) {?>
                <li><a href="#" onclick="$(this).closest('ul').find('li.hidden').removeClass('hidden'); $(this).parent().remove(); return false;">...</a></li>
            <?php }?>

			<li <?php if ($_smarty_tpl->tpl_vars['crump']->total>4&&$_smarty_tpl->tpl_vars['crump']->index>1&&$_smarty_tpl->tpl_vars['crump']->index<$_smarty_tpl->tpl_vars['crump']->total-1) {?>class="hidden"<?php }?>>
                <?php if ($_smarty_tpl->tpl_vars['crump']->value['icon']) {?><i class="fa text-muted <?php echo $_smarty_tpl->tpl_vars['crump']->value['icon'];?>
"></i>&nbsp;<?php }?><a <?php if ($_smarty_tpl->tpl_vars['crump']->value['muted']) {?>class="text-muted"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['crump']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['crump']->value['title'];?>
</a>
            </li>
		<?php } ?>
	<?php }?>

	<li><?php echo $_smarty_tpl->tpl_vars['controller_info']->value['title'];?>
</li>
</ul>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\lists\sortgroup.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab972de31_79282138')) {function content_5c5a2ab972de31_79282138($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?>

        

<?php if ($_smarty_tpl->tpl_vars['ar_sort']->value) {?>
    <div class="pull-right">
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" title="Сортировка">
                <i class="fa fa-sort-amount-<?php if ($_smarty_tpl->tpl_vars['sort']->value['dir']==@constant('SORT_ASC_AZ')) {?>asc<?php } else { ?>desc<?php }?>"></i><span class="hidden-xs"> <?php echo $_smarty_tpl->tpl_vars['ar_sort']->value[$_smarty_tpl->tpl_vars['sort']->value['by']]['name'];?>
</span> <span class="caret"></span>
            </button>
    
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-wauto" role="menu">
                <?php  $_smarty_tpl->tpl_vars['sort_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sort_item']->_loop = false;
 $_smarty_tpl->tpl_vars['by'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_sort']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sort_item']->key => $_smarty_tpl->tpl_vars['sort_item']->value) {
$_smarty_tpl->tpl_vars['sort_item']->_loop = true;
 $_smarty_tpl->tpl_vars['by']->value = $_smarty_tpl->tpl_vars['sort_item']->key;
?>
                <li <?php if ($_smarty_tpl->tpl_vars['sort']->value['by']==$_smarty_tpl->tpl_vars['by']->value) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }?>sort[by]=<?php echo $_smarty_tpl->tpl_vars['by']->value;?>
&sort[dir]=<?php echo $_smarty_tpl->tpl_vars['sort']->value['dir'];?>
"><?php echo $_smarty_tpl->tpl_vars['sort_item']->value['name'];?>
</a></li>
                <?php } ?>
    
                <li class="divider"></li>
    
                <li <?php if ($_smarty_tpl->tpl_vars['sort']->value['dir']==@constant('SORT_ASC_AZ')) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }?>sort[by]=<?php echo $_smarty_tpl->tpl_vars['sort']->value['by'];?>
&sort[dir]=<?php echo @constant('SORT_ASC_AZ');?>
"><i class="fa fa-sort-amount-asc"></i> <?php echo L::sort_asc;?>
</a></li>
                <li <?php if ($_smarty_tpl->tpl_vars['sort']->value['dir']==@constant('SORT_DSC_ZA')) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }?>sort[by]=<?php echo $_smarty_tpl->tpl_vars['sort']->value['by'];?>
&sort[dir]=<?php echo @constant('SORT_DSC_ZA');?>
"><i class="fa fa-sort-amount-desc"></i> <?php echo L::sort_desc;?>
</a></li>
            </ul>
        </div>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ar_group']->value) {?>
    <div class="pull-right">
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" title="Группировка">
                
                <i class="fa fa-object-ungroup"></i><span class="hidden-xs"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['ar_group']->value[$_smarty_tpl->tpl_vars['group']->value['by']]['name'])===null||$tmp==='' ? "Нет" : $tmp);?>
</span> <span class="caret"></span>
            </button>

            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-wauto" role="menu">
                <li <?php if (!$_smarty_tpl->tpl_vars['group']->value['by']||$_smarty_tpl->tpl_vars['group']->value['by']=="none") {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }?>group[by]=none">Нет</a></li>
                <li class="divider"></li>

                <?php  $_smarty_tpl->tpl_vars['group_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_item']->_loop = false;
 $_smarty_tpl->tpl_vars['by'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_item']->key => $_smarty_tpl->tpl_vars['group_item']->value) {
$_smarty_tpl->tpl_vars['group_item']->_loop = true;
 $_smarty_tpl->tpl_vars['by']->value = $_smarty_tpl->tpl_vars['group_item']->key;
?>
                    <li <?php if ($_smarty_tpl->tpl_vars['group']->value['by']==$_smarty_tpl->tpl_vars['by']->value) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }?>group[by]=<?php echo $_smarty_tpl->tpl_vars['by']->value;?>
&group[dir]=<?php echo $_smarty_tpl->tpl_vars['group']->value['dir'];?>
"><?php echo $_smarty_tpl->tpl_vars['group_item']->value['name'];?>
</a></li>
                <?php } ?>

                <li class="divider"></li>

                <li <?php if ($_smarty_tpl->tpl_vars['group']->value['dir']==@constant('SORT_ASC_AZ')) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }?>group[by]=<?php echo $_smarty_tpl->tpl_vars['group']->value['by'];?>
&group[dir]=<?php echo @constant('SORT_ASC_AZ');?>
"><i class="fa fa-sort-amount-asc"></i> <?php echo L::sort_asc;?>
</a></li>
                <li <?php if ($_smarty_tpl->tpl_vars['group']->value['dir']==@constant('SORT_DSC_ZA')) {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['current_url_path']->value;?>
?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['conditions']->value,"cnd");
if ($_smarty_tpl->tpl_vars['conditions']->value) {?>&<?php }?>group[by]=<?php echo $_smarty_tpl->tpl_vars['group']->value['by'];?>
&group[dir]=<?php echo @constant('SORT_DSC_ZA');?>
"><i class="fa fa-sort-amount-desc"></i> <?php echo L::sort_desc;?>
</a></li>
            </ul>
        </div>
    </div>
<?php }?>


<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\alerts.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab9885a88_89462881')) {function content_5c5a2ab9885a88_89462881($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['alerts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['alerts']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['system_alerts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['alerts']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['alerts']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['alerts']->key => $_smarty_tpl->tpl_vars['alerts']->value) {
$_smarty_tpl->tpl_vars['alerts']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['alerts']->key;
 $_smarty_tpl->tpl_vars['alerts']->iteration++;
 $_smarty_tpl->tpl_vars['alerts']->last = $_smarty_tpl->tpl_vars['alerts']->iteration === $_smarty_tpl->tpl_vars['alerts']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['alert_types']['last'] = $_smarty_tpl->tpl_vars['alerts']->last;
?>

    <?php if ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_SUCCESS')) {?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("success", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Сообщение", null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_WARNING')) {?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("warning", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Внимание", null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_ERROR')) {?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("danger", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Обнаружены ошибки", null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_DANGER')) {?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("danger", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Обнаружены системные ошибки", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["alert_type"] = new Smarty_variable("info", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["alert_title"] = new Smarty_variable("Информация", null, 0);?>
    <?php }?>

    <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['alert_type']->value;?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['alert_types']['last']) {?>clamped-margin-bottom<?php }?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        

        <?php $_smarty_tpl->tpl_vars["alerts_buffer"] = new Smarty_variable('', null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['alert'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['alert']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['alerts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['alert']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['alert']->iteration=0;
 $_smarty_tpl->tpl_vars['alert']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['alert']->key => $_smarty_tpl->tpl_vars['alert']->value) {
$_smarty_tpl->tpl_vars['alert']->_loop = true;
 $_smarty_tpl->tpl_vars['alert']->iteration++;
 $_smarty_tpl->tpl_vars['alert']->index++;
 $_smarty_tpl->tpl_vars['alert']->first = $_smarty_tpl->tpl_vars['alert']->index === 0;
 $_smarty_tpl->tpl_vars['alert']->last = $_smarty_tpl->tpl_vars['alert']->iteration === $_smarty_tpl->tpl_vars['alert']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['alerts']['first'] = $_smarty_tpl->tpl_vars['alert']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['alerts']['last'] = $_smarty_tpl->tpl_vars['alert']->last;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['alerts']['first']) {?>
                <small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['alert']->value['time'],'%D %H:%M:%S');?>
</small>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_DANGER')) {?>
                <?php $_smarty_tpl->tpl_vars["alerts_buffer"] = new Smarty_variable(($_smarty_tpl->tpl_vars['alerts_buffer']->value).($_smarty_tpl->tpl_vars['alert']->value['message']), null, 0);?>
                <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['alerts']['last']) {?>
                    <?php $_smarty_tpl->tpl_vars["alerts_buffer"] = new Smarty_variable(((($_smarty_tpl->tpl_vars['alerts_buffer']->value).(@constant('PHP_EOL'))).("---")).(@constant('PHP_EOL')), null, 0);?>
                <?php }?>
            <?php } else { ?>
                <p><?php echo $_smarty_tpl->tpl_vars['alert']->value['message'];?>
</p>
            <?php }?>
        <?php } ?>

        <?php if ($_smarty_tpl->tpl_vars['type']->value==@constant('ALERT_DANGER')) {?>
            <textarea rows="3" class="form-control form-base64"><?php if ($_smarty_tpl->tpl_vars['config']->value->dev_mode) {
echo $_smarty_tpl->tpl_vars['alerts_buffer']->value;
} else {
echo base64_encode($_smarty_tpl->tpl_vars['alerts_buffer']->value);
}?></textarea>
            <p>Пожалуйста, отправте этот код по адресу службы поддержки: <a href="mailto:<?php echo @constant('IW_EMAIL_SUPPORT');?>
"><?php echo @constant('IW_EMAIL_SUPPORT');?>
</a></p>
        <?php }?>

    </div>
<?php } ?>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mrooms\view\wrap.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab998f4c2_80319684')) {function content_5c5a2ab998f4c2_80319684($_smarty_tpl) {?><div class="container-fluid">

    <div class="form-horizontal form-clamped">
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_places;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static"><?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['places']) {
echo $_smarty_tpl->tpl_vars['mroom_data']->value['places'];
} else { ?><span class="text-muted"><?php echo L::text_not_specified;?>
</span><?php }?></p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_projector;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_PROJECTOR')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_loudspeaker;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_LOUDSPEAKER')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_microphone;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_MICROPHONE')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_whiteboard;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_WHITEBOARD')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_mrooms_conference;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['rflags']&@constant('RM_CONFERENCE')) {?><i class="fa fa-check text-success"></i><?php } else { ?><i class="fa fa-times text-muted"></i><?php }?>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 col-xs-5 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-xs-7 col-sm-8 ">
                <p class="form-control-static">
                    <?php if ($_smarty_tpl->tpl_vars['mroom_data']->value['descr']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['mroom_data']->value['descr'];?>

                    <?php } else { ?>
                        <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                    <?php }?>
                </p>
            </div>
        </div>
    </div>


</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:30:49
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mrooms\reservations\calendar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c5a2ab9a10368_68842210')) {function content_5c5a2ab9a10368_68842210($_smarty_tpl) {?><?php echo '<script'; ?>
 src="min/?g=fullcalendarjs"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="min/?g=fullcalendarcss">

<?php if (@constant('LANG_CURRENT')=="ru") {?>
    <?php echo '<script'; ?>
 type="text/javascript" src="resources/js/jquery/plugin/fullcalendar/js/lang/ru.js"><?php echo '</script'; ?>
>
<?php } else { ?>
    <?php echo '<script'; ?>
 type="text/javascript" src="resources/js/jquery/plugin/fullcalendar/js/lang/en-au.js"><?php echo '</script'; ?>
>
<?php }?>


<div id="reservations-calendar"></div>

<?php echo '<script'; ?>
>
    var current_mroom_id = <?php echo intval($_smarty_tpl->tpl_vars['mroom_id']->value);?>
;

   function move_event(event, delta_start, delta_end) {
       $.ajax({
           url: 'mrooms/reservations/move_events/?mrr_id='+event.id,
           type: 'get',
           dataType: 'json',
           data: {
               delta_start : delta_start,
               delta_end   : delta_end
           },
           success: function(response) {
               if (response.status == 200) {
                   toastr.success('<?php echo L::toastr_mrooms_changetime_message;?>
');
               }
           }
       });
   }

	$('body').bind('init.layout', function(event){
		$("#reservations-calendar").fullCalendar({

                /*lang: '<?php echo @constant('LANG_CURRENT');?>
',*/

			events: function(start, end, timezone, callback) {

                $("#reservations-calendar").find(".fc-center").stop(true, true).show().html('<i class="fa fa-spinner fa-spin"></i>');

				$.ajax({
					url: 'mrooms/reservations/get_events/?mroom_id='+current_mroom_id,
					type: 'get',
					dataType: 'json',
					data: {
						start   : start.unix(),
						end     : end.unix(),
						mroom_id: current_mroom_id
					},
					success: function(response) {
						callback(response.data);
                        $("#reservations-calendar").find(".fc-center").fadeOut(function () {
                            $(this).empty().html('<span class="badge badge-info">'+response.data.length+'</span>').fadeIn(function () {
                                var events_status = this;
                                setTimeout(function () {
                                    $(events_status).fadeOut(function() { $(this).empty().show()});
                                }, 1000);
                            });
                        });
					}
				});
			},

			header: {
				left: 'prev,next today',
				right: 'title'
				/*right: 'month,agendaWeek,agendaDay'*/
			},
			defaultView: 'agendaWeek',
			height:'auto',

            
            editable: true,
            selectable: true,

            
            eventDrop: function(event, delta, revertFunc) {
                bootbox.confirm({title: "<?php echo L::confirm_mroomsres_move_title;?>
", "message": "<?php echo L::confirm_mroomsres_move_message;?>
".replace('%name%', event.title).replace('%time%', event.start.format()), callback: function(r) {
                    if (!r) {
                        revertFunc();
                    } else {
                        move_event(event, delta.asSeconds(), delta.asSeconds());
                    }
                }});
            },

            eventResize: function(event, delta, revertFunc) {
                bootbox.confirm({title: "<?php echo L::confirm_mroomsres_move_title;?>
", "message": "<?php echo L::confirm_mroomsres_move_message;?>
".replace('%name%', event.title).replace('%time%', event.start.format()), callback: function(r) {
                    if (!r) {
                        revertFunc();
                    } else {
                        move_event(event, 0, delta.asSeconds());
                    }
                }});
            },

            

			select: function(start, end, allDay) {

				/*
				 //http://momentjs.com/docs/#/displaying/format/
				 console.log(start.format('h:mm tt'), end);
				 */


                <?php if ($_smarty_tpl->tpl_vars['modal']->value) {?>
                
                    $('#modal-remote').modal({remote: 'mrooms/reservations/create/?mrr_data[mroom_id]='+current_mroom_id+'&mrr_data[unix_start]='+start.unix()+'&mrr_data[unix_end]='+end.unix()+'&pane=0'});
                
                <?php } else { ?>
                    $("#mroom_reservations_form").find(".start_datetime input:text").parent().datetimepicker('update', start.format('DD/MM/YYYY HH:mm'));
                    $("#mroom_reservations_form").find(".end_datetime input:text").parent().datetimepicker('update', end.format('DD/MM/YYYY HH:mm'));
                    toastr.success('<?php echo L::toastr_mrooms_setinterval_message;?>
', '<?php echo L::toastr_mrooms_setinterval_title;?>
');
                <?php }?>

			},

			businessHours: {
				start: '10:00',
				end: '19:00',

				dow: [ 1, 2, 3, 4, 5 ]
			},

			weekends: false,

			minTime: '10:00',
			maxTime: '19:00'

		});
	});

<?php echo '</script'; ?>
>
<?php }} ?>
