<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:46
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\dashboard\chart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154045c5a2282c552a8-49043040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c89e4f1da238a4cff42fac5bccc79f9bd93c1db' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\dashboard\\chart.tpl',
      1 => 1447934390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154045c5a2282c552a8-49043040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2282c68b24_82582550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2282c68b24_82582550')) {function content_5c5a2282c68b24_82582550($_smarty_tpl) {?>



<div class="cm-container"><div><i class="fa fa-spinner fa-spin"></i> Ждите, идет построение графика...</div></div>








	<?php echo '<script'; ?>
>


		// зададим обработчик
		$('body').bind('init.layout', function(event){

            $.getJSON('dashboard/get_pulse/', function (csv) {

                $('#pulse-container').highcharts({
                    series:
                        csv.series
                    ,
                    chart: {
                        type: 'column' //areaspline,column
                    },
                    title: {
                        text: '<?php echo L::modules_dashboard_text_chart_title;?>
'
                    },
                    legend: {
                        itemStyle: {fontWeight: "normal", fontSize: "10px", "color": "#333"}

                    },
                    subtitle: {
                        text: 'Подробную статистику смотрите в <a href="<?php echo @constant('HOST_ROOT');?>
reports/">' + 'отчетах</a>'
                    },
                    /*xAxis: {
                        allowDecimals: false,
                        labels: {
                            formatter: function () {
                                return this.value; // clean, unformatted number for year
                            }
                        }
                    },*/
                    yAxis: {
                        title: {
                            text: '<?php echo L::modules_dashboard_text_chart_yAxis_title;?>
'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:14px;">{point.key}</span><br>',
                        pointFormat: 'Статус "{series.name}"<br/>установлен <b>{point.y}</b> раз(а)'
                    },

                    plotOptions: {
                        areaspline: {
                            fillOpacity: 0.5
                        },
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                style: {fontWeight: "normal", fontSize: "10px", "color": "#333"},
                                enabled: true,
                                format: '{point.y}'
                            }
                        }
                    },
                    /*plotOptions: {
                        area: {
                            pointStart: 1,
                            marker: {
                                enabled: false,
                                symbol: 'circle',
                                radius: 2,
                                states: {
                                    hover: {
                                        enabled: true
                                    }
                                }
                            }
                        }
                    }*/

                    xAxis: csv.xAxis
                });
        });

        });

	<?php echo '</script'; ?>
>
<?php }} ?>
