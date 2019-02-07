<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:30
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\users\view\block_chart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:260745a04282eee0039-91674983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '268ffaa0eb7113521a20452debae50f338937a70' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_chart.tpl',
      1 => 1450880688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '260745a04282eee0039-91674983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a04282ef24377_04364028',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04282ef24377_04364028')) {function content_5a04282ef24377_04364028($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><div style="position:relative" id="chart-container">
    
    <div class="alert alert-default">Ждите, идет построение графика...</div>
</div>



    <?php echo '<script'; ?>
>

        function build_chart() {
            $.getJSON('users/view/<?php echo $_smarty_tpl->tpl_vars['user_data']->value['eid'];?>
/get_stat/', function (csv) {

                if (csv.series == undefined) {
                    $('#chart-container').find(".alert").html("<?php echo smarty_modifier_mb_ucfirst(L::modules_demands_name);?>
 не найдены");
                    return;
                }

                $('#chart-container').css({height:'200px'}).highcharts({
                    series:
                            csv.series
                    ,
                    chart: {
                        type: 'column' //areaspline,column
                    },
                    title: {
                        text: null
                    },
                    legend: {
                        itemStyle: {fontWeight: "normal", fontSize: "10px", "color": "#333"}

                    },
                    /*subtitle: {
                     text: 'Подробную статистику смотрите в <a href="http://{$smarty.const.HOST_ROOT}/">' +
                     'отчетах</a>'
                     },*/

                    yAxis: {
                        title: {
                            text: 'Количество'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:14px;">{point.key}</span><br>',
                        pointFormat: '<b>{point.y}</b> заявк(и,а) в статусе "{series.name}"'
                    },

                    plotOptions: {
                        areaspline: {
                            fillOpacity: 0.5
                        },
                        series: {
                            events: {
                                click: function(event) {
                                    var role = event.point.index+1;
                                    var status = this.userOptions.status;
                                    
                                    var url = '/demands/?cnd[status]='+status;
                                    if (role == <?php echo @constant('USER_ROLE_CUSTOMER');?>
) {
                                        url+='&cnd[cu_eid]=<?php echo $_smarty_tpl->tpl_vars['user_data']->value['eid'];?>
';
                                    } else if (role == <?php echo @constant('USER_ROLE_EXECUTOR');?>
) {
                                        url+='&cnd[eu_eid]=<?php echo $_smarty_tpl->tpl_vars['user_data']->value['eid'];?>
';
                                    } else {
                                        url+='&cnd[ru_eid]=<?php echo $_smarty_tpl->tpl_vars['user_data']->value['eid'];?>
';
                                    }
                                    

                                    window.location = url;
                                    return false;
                                }
                            },

                            cursor: 'pointer',

                            borderWidth: 0,
                            dataLabels: {
                                style: {fontWeight: "normal", fontSize: "10px", "color": "#333"},
                                enabled: true,
                                format: '{point.y}'
                            }
                        }
                    },

                    xAxis: csv.xAxis
                });
            });
        }

        yepnope({
            load: ["resources/js/jquery/plugin/highcharts/highcharts.js"],
            complete: function() {

                if (CoreIW.layout_init) {
                    build_chart();
                } else {
                    $('body').bind('init.layout', function(){
                        build_chart();
                    }).bind('previewLoaded.content', function(){
                        build_chart();
                    });
                }

            }
        });




    <?php echo '</script'; ?>
>

<?php }} ?>
