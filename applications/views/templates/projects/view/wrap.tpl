{$project_data.descr}

<div id="pv-list-container">
    <div class="h3">
        Версии
        {if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_U}
        <button class="pull-right body-font btn-sm btn-default" onclick="toggle_pv_form()"><i class="fa fa-plus"></i> Добавить версию</button>
        {/if}
        <div class="clearfix"></div>
    </div>
    {include file="../versions/list.tpl" project_id=$project_data.id}
</div>
<div class="clearfix"></div>
<div class="alert alert-info">
    {*Заявкам, в которых был установлен статус "Завершено" в диапазоне между датой версии*}
    {*Версии назначаются автоматически, исходя из даты версии и даты установки заявки в статус "Завершено"*}
    Версии автоматически назначаются заявкам, в которых дата установки статуса &laquo;Завершено&raquo; входит в диапозон между верхней и нижней (предыдущей) датами версий. Одна заявка может принадлежать нескольким версиям, если работа над ней возобновлялась.
</div>

{if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_U}
<div id="pv-form-container" style="display: none">
    <div class="h3">Добавить версию</div>
    <div class="well sell-sm">
        {include file="../versions/form/wrap.tpl"}
    </div>
</div>
{/if}

<div class="h3">{L::modules_demands_name} проекта</div>
{include file="demands/list.tpl" ar_demands=$ar_demands module_id=cls_modules::MODULE_DEMANDS denied_delete=true collapsed=true}

{if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_U}
<script>
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
            url: "/projects/view/{$project_data.id}/add_version/",
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
        {literal}
        bootbox.confirm({message: "Вы уверены, что хотите удалить версию проекта?", title: "Удаление версии проекта", callback: function(r) { if (r) {
            $.ajax({
                url: "/projects/view/{/literal}{$project_data.id}{literal}/delete_version/",
                dataType: 'json',
                method: "post",
                data: {id: version_id},
                success: function (response) {
                    $tr.fadeOut('normal', function() { $("#pv-list").html(response.list); });
                }
            });
        } }});

        {/literal}
    });


</script>
{/if}