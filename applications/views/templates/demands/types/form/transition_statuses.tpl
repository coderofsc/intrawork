{literal}
    <style>
        table#transition-statuses {
            border-spacing: 0;
            border-collapse: collapse;
            overflow: hidden;
            z-index: 1;
        }

        table#transition-statuses td, table#transition-statuses th {
            padding: 10px;
            position: relative;
        }

        table#transition-statuses th[data-id] {
            /*width:100px;*/
           min-width:100px;
        }

        table#transition-statuses td:hover::before {
            background-color: #f9f9f9;
            content: '\00a0';
            height: 100%;
            left: -5000px;
            position: absolute;
            top: 0;
            width: 10000px;
            z-index: -1;
        }

        table#transition-statuses td:hover::after {
            background-color: #f9f9f9;
            content: '\00a0';
            height: 10000px;
            left: 0;
            position: absolute;
            top: -5000px;
            width: 100%;
            z-index: -1;
        }

        table#transition-statuses tr.ondrag td,
        table#transition-statuses tr.ondrag th {
            background-color: #ffa;
        }

        table#transition-statuses tr.ondrag .draghandle {
            color: #333;
        }

        table#transition-statuses .draghandle {
            cursor: move;
        }



    </style>
{/literal}

{*{assign var="ar_exists" value=array()}*}
<div style="overflow-x: auto">
<table class="table" {*style="max-width: none"*} id="transition-statuses">
    <colgroup>
        <col width="100"/>
        <col width="20"/>
        <col width="100"/>
        <col width="*"/>
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th></th>
        <th>Активен</th>
        {foreach from=$ts|array_keys item=m_status_id}
            <th data-id="{$m_status_id}" class="text-center">{m_demands::$ar_status[$m_status_id].name}</th>
        {/foreach}
    </tr>
    </thead>
    <tbody>
    {foreach from=$ts key=m_status_id item=master}
        <tr data-id="{$m_status_id}">
            <th nowrap="" class="valign-middle">
                <i class="fa fa-arrows-v text-muted draghandle"></i>&nbsp;
                {m_demands::$ar_status[$m_status_id].name}
            </th>
            <th class="valign-middle">
                {if $m_status_id != m_demands::STATUS_NEW}
                    <a href="#" class="delete-status"><i class="fa fa-trash"></i></a>
                {/if}
            </th>
            <th>
                <select class="selectpicker" data-width="150px" name="dt_data[ts][{$m_status_id}][active_role]">
                    <option value="0"></option>
                    <option {if $master.active_role==$smarty.const.USER_ROLE_CUSTOMER}selected=""{/if} value="{$smarty.const.USER_ROLE_CUSTOMER}">{L::members_customer}</option>
                    <option {if $master.active_role==$smarty.const.USER_ROLE_EXECUTOR}selected=""{/if} value="{$smarty.const.USER_ROLE_EXECUTOR}">{L::members_executor}</option>
                    <option {if $master.active_role==$smarty.const.USER_ROLE_RESPONSIBLE}selected=""{/if} value="{$smarty.const.USER_ROLE_RESPONSIBLE}">{L::members_responsible}</option>
                </select>
            </th>
            {foreach from=$ts|array_keys item=s_status_id}
                <td data-id="{$s_status_id}" class="text-center">
                    {if $m_status_id == $s_status_id}
                        <input name="dt_data[ts][{$m_status_id}][slaves][]" value="{$s_status_id}" type="hidden">
                    {/if}
                    <div class="checkbox">
                    <input class="i-checks" {if $m_status_id == $s_status_id}disabled="" checked=""{elseif in_array($s_status_id, $master.slaves)}checked=""{/if} {if $m_status_id != $s_status_id}name="dt_data[ts][{$m_status_id}][slaves][]"{/if} value="{$s_status_id}" type="checkbox" />
                    </div>
                </td>
            {/foreach}
        </tr>
    {/foreach}
    </tbody>
</table>
</div>

{*Не закрывается dropdown selecta*}
<div class="space space-sm"></div>
<select {*multiple*} class="selectpicker" id="unused_statuses">
    <option value="0"></option>
    {foreach from=m_demands::$ar_status key=status_id item=status}
        <option {if $ts.$status_id}disabled=""{/if} value="{$status_id}">{$status.name}</option>
    {/foreach}
</select>
<button class="btn btn-success" id="btn-add-statuses">Добавить статусы</button>

<script src="resources/js/jquery/plugin/tablednd/jquery.tablednd.min.js"></script>
<script>

    $(document).ready(function () {

        var $ts_table = $("#transition-statuses");

        function add_status(id, name) {

            var buffer_row = '';
            buffer_row+= '<tr data-id="'+id+'">'+
                '<th class="valign-middle" nowrap=""><i class="fa fa-arrows-v text-muted draghandle"></i>&nbsp;'+name+'</th>'+
                '<th class="valign-middle"><a href="#" class="delete-status"><i class="fa fa-trash"></i></a></th>'+
                '<th>'+
                    '<select class="selectpicker" data-width="150px" name="dt_data[ts]['+id+'][active_role]">'+
                        '<option value="0"></option>'+
                        '<option value="{$smarty.const.USER_ROLE_CUSTOMER}">{L::members_customer}</option>'+
                        '<option value="{$smarty.const.USER_ROLE_EXECUTOR}">{L::members_executor}</option>'+
                        '<option value="{$smarty.const.USER_ROLE_RESPONSIBLE}">{L::members_responsible}</option>'+
                    '</select>'+
                '</th>';

            $ts_table.find("tr[data-id]").each(function() {
                var m_status_id = $(this).data("id");
                var buffer_td ='<td data-id="'+id+'" class="text-center"><div class="checkbox"><input class="i-checks" name="dt_data[ts]['+m_status_id+'][slaves][]" value="'+id+'" type="checkbox"></div></td>';
                $(this).append(buffer_td);
                buffer_td ='<td data-id="'+m_status_id+'" class="text-center"><div class="checkbox"><input class="i-checks" name="dt_data[ts]['+id+'][slaves][]" value="'+m_status_id+'" type="checkbox"></div></td>';
                buffer_row+=buffer_td;
            });

            buffer_row+='<td data-id="'+id+'" class="text-center"><div class="checkbox"><input name="dt_data[ts]['+id+'][slaves][]" value="'+id+'" type="hidden"><input class="i-checks" checked="" disabled="" value="1" type="checkbox"></div></td>';
            $ts_table.append(buffer_row);
            $ts_table.find("thead tr").append('<th class="text-center" data-id="'+id+'">'+name+'</th>');

            CoreIW.init_icheck($ts_table.find('td[data-id="'+id+'"]'));
            $ts_table.find("tr[data-id]").each(function() {
                var m_status_id = $(this).data("id");
                CoreIW.init_icheck($ts_table.find('td[data-id="'+m_status_id+'"]'));
            });
            CoreIW.init_selectpicker($ts_table.find('tr[data-id="'+id+'"]'));
        }

        var $unused_statuses = $("select#unused_statuses");

        $("#btn-add-statuses").on("click", function() {
            $unused_statuses.find("option:selected").each(function() {
                var status_id = $(this).val();
                var status_name = $(this).text();
                if (status_id == 0) {
                    return false;
                }

                add_status(status_id, status_name);
                $(this).attr("disabled", "disabled");

            });
            $unused_statuses.selectpicker('val', 0).selectpicker("refresh");

            table_dnd();

            return false;
        });


        $ts_table.delegate(".delete-status", "click", function() {
            var $row = $(this).closest("tr");
            var status_id = $row.data("id");
            $row.remove();
            $("th[data-id="+status_id+"], td[data-id="+status_id+"]").remove();

            $unused_statuses.find("option[value="+status_id+"]").removeAttr("disabled");
            $unused_statuses.selectpicker("refresh");

            return false;
        });

        var drag_start_index = 0;

        function table_dnd() {
            $ts_table.tableDnD(
                    {
                        dragHandle: ".draghandle",
                        onDragClass: "ondrag",
                        onDragStop: function (table, row) {
                            var status_id = $(row).data("id");
                            var drag_end_index = $(row).index();

                            $("th[data-id='" + status_id +"'],td[data-id='" + status_id +"']").each(function () {
                                var $el = $(this).parent().children().eq(drag_end_index+3);

                                if (drag_start_index > drag_end_index) {
                                    $(this).insertBefore($el);
                                } else {
                                    $(this).insertAfter($el);
                                }
                            });
                        },
                        onDragStart: function (table, drag) {
                            drag_start_index = $(drag).closest("tr").index();
                        }
                    }
            );
        }

        table_dnd();

    });

</script>