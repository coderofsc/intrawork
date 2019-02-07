{*<style>

	.ibox {
		clear: both;
		margin-bottom: 25px;
		margin-top: 0;
		padding: 0;
	}
	.ibox:after,
	.ibox:before {
		display: table;
	}
	.ibox-title {
		-moz-border-bottom-colors: none;
		-moz-border-left-colors: none;
		-moz-border-right-colors: none;
		-moz-border-top-colors: none;
		background-color: #ffffff;
		border-color: #e7eaec;
		border-image: none;
		border-style: solid solid none;
		border-width: 4px 0px 0;
		color: inherit;
		margin-bottom: 0;
		padding: 14px 15px 7px;
		height: 48px;
	}
	.ibox-content {
		background-color: #ffffff;
		color: inherit;
		padding: 15px 20px 20px 20px;
		border-color: #e7eaec;
		border-image: none;
		border-style: solid solid none;
		border-width: 1px 0px;
	}
	.ibox-content h1 {
		font-size:16px;
	}

</style>

<div class="container-fluid">

	<div class="row">
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-title">
					<span class="label label-success pull-right">Monthly</span>
					<h5>Income</h5>
				</div>
				<div class="ibox-content">
					<h1 class="clamped">886,200</h1>
					<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
					<small>Total income</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-title">
					<span class="label label-info pull-right">Annual</span>
					<h5>Orders</h5>
				</div>
				<div class="ibox-content">
					<h1 class="clamped">275,800</h1>
					<div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
					<small>New orders</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-title">
					<span class="label label-primary pull-right">Today</span>
					<h5>Vistits</h5>
				</div>
				<div class="ibox-content">
					<h1 class="clamped">106,120</h1>
					<div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
					<small>New visits</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-title">
					<span class="label label-danger pull-right">Low value</span>
					<h5>User activity</h5>
				</div>
				<div class="ibox-content">
					<h1 class="clamped">80,600</h1>
					<div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
					<small>In first month</small>
				</div>
			</div>
		</div>
	</div>
</div>
*}

{*
<div class="v-margin h-margin" id="myChart" style="height:200px;">
    <div><i class="fa fa-spinner fa-spin"></i> Ждите, идет построение графика...</div>
</div>
*}

<div class="cm-container"><div><i class="fa fa-spinner fa-spin"></i> Ждите, идет построение графика...</div></div>


{*<script src="resources/js/jquery/plugin/highcharts/highcharts.js"></script>*}
{*<script src="http://code.highcharts.com/modules/data.js"></script>*}
{*<script src="http://code.highcharts.com/modules/exporting.js"></script>*}


{literal}
	<script>


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
                        text: '{/literal}{L::modules_dashboard_text_chart_title}{literal}'
                    },
                    legend: {
                        itemStyle: {fontWeight: "normal", fontSize: "10px", "color": "#333"}

                    },
                    subtitle: {
                        text: 'Подробную статистику смотрите в <a href="{/literal}{$smarty.const.HOST_ROOT}reports/{literal}">' + 'отчетах</a>'
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
                            text: '{/literal}{L::modules_dashboard_text_chart_yAxis_title}{literal}'
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

	</script>
{/literal}