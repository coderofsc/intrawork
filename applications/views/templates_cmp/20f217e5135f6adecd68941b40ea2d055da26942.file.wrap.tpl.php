<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 19:15:47
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\projects\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304955c5b083362c3d0-51327620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20f217e5135f6adecd68941b40ea2d055da26942' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\projects\\view\\wrap.tpl',
      1 => 1453151584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304955c5b083362c3d0-51327620',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project_data' => 0,
    'ar_demands' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5b0833686165_83783520',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5b0833686165_83783520')) {function content_5c5b0833686165_83783520($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
?><?php echo $_smarty_tpl->tpl_vars['project_data']->value['descr'];?>


<div id="pv-list-container">
    <div class="h3">
        Версии
        <?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_U)) {?>
        <button class="pull-right body-font btn-sm btn-default" onclick="toggle_pv_form()"><i class="fa fa-plus"></i> Добавить версию</button>
        <?php }?>
        <div class="clearfix"></div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("../versions/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('project_id'=>$_smarty_tpl->tpl_vars['project_data']->value['id']), 0);?>

</div>
<div class="clearfix"></div>
<div class="alert alert-info">
    
    
    Версии автоматически назначаются заявкам, в которых дата установки статуса &laquo;Завершено&raquo; входит в диапозон между верхней и нижней (предыдущей) датами версий. Одна заявка может принадлежать нескольким версиям, если работа над ней возобновлялась.
</div>

<?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_U)) {?>
<div id="pv-form-container" style="display: none">
    <div class="h3">Добавить версию</div>
    <div class="well sell-sm">
        <?php echo $_smarty_tpl->getSubTemplate ("../versions/form/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>
<?php }?>

<div class="h3"><?php echo L::modules_demands_name;?>
 проекта</div>
<?php echo $_smarty_tpl->getSubTemplate ("demands/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_demands'=>$_smarty_tpl->tpl_vars['ar_demands']->value,'module_id'=>cls_modules::MODULE_DEMANDS,'denied_delete'=>true,'collapsed'=>true), 0);?>


<?php if (smarty_modifier_access(cls_modules::MODULE_PROJECTS,m_roles::CRUD_U)) {?>
<?php echo '<script'; ?>
>
    function toggle_pv_form() {
        var $pv_cnt = $('#pv-form-container');
        var scroll = true;
        if ($pv_cnt.is(":visible")) {
            scroll = false;
        }

        $pv_cnt.slideToggle();
        if (scroll) {
            $pv_cnt.closest('.ui-layout-content').scrollTo($pv_cnt, 500);
        }

        return false;
    }

    function add_pv(data, callback) {

        $.ajax({
            url: "/projects/view/<?php echo $_smarty_tpl->tpl_vars['project_data']->value['id'];?>
/add_version/",
            dataType: 'json',
            method: 'post',
            data: data,
            success: function (response) {
                $form.find("button:submit").removeAttr("disabled");

                if (response.status == 200) {

                    toastr.success('Версия успешно добавлена', 'Новая версия');

                    if (callback != undefined) {
                        if (typeof(callback) === "function") {
                            callback(response);
                        } else {
                            window[callback](response);
                        }
                    }

                } else {
                    $(response.ar_errors).each(function(index, error) {
                        toastr.error(error);
                    });

                }
            }
        });
    }

    var $form = $("#pv-form");

    $form.find("button:submit").on("click", function() {
        var $self = $(this);
        $self.attr("disabled", "disabled");

        add_pv($form.serialize(), function(response) {
            $form.get(0).reset();
            toggle_pv_form();

            $("#pv-list").html(response.list);
            $form.closest('.ui-layout-content').scrollTo($("#pv-list-container"), 500);
        });
        return false;
    });

    $("#pv-list").delegate(".btn-delete", "click", function() {
        var $tr =  $(this).closest("tr");
        var version_id = $tr.data("id");
        
        bootbox.confirm({message: "Вы уверены, что хотите удалить версию проекта?", title: "Удаление версии проекта", callback: function(r) { if (r) {
            $.ajax({
                url: "/projects/view/<?php echo $_smarty_tpl->tpl_vars['project_data']->value['id'];?>
/delete_version/",
                dataType: 'json',
                method: "post",
                data: {id: version_id},
                success: function (response) {
                    $tr.fadeOut('normal', function() { $("#pv-list").html(response.list); });
                }
            });
        } }});

        
    });


<?php echo '</script'; ?>
>
<?php }?><?php }} ?>
