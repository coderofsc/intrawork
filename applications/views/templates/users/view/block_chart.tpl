<div style="position:relative" id="chart-container">
    {*<div class="cm-container"><div><i class="fa fa-spinner fa-spin"></i> Ждите, идет построение графика...</div></div>*}
    <div class="alert alert-default">Ждите, идет построение графика...</div>
</div>


{literal}
    <script>

        function build_chart() {
            $.getJSON('users/view/{/literal}{$user_data.eid}{literal}/get_stat/', function (csv) {

                if (csv.series == undefined) {
                    $('#chart-container').find(".alert").html("{/literal}{L::modules_demands_name|mb_ucfirst}{literal} не найдены");
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
                                    {/literal}
                                    var url = '/demands/?cnd[status]='+status;
                                    if (role == {$smarty.const.USER_ROLE_CUSTOMER}) {
                                        url+='&cnd[cu_eid]={$user_data.eid}';
                                    } else if (role == {$smarty.const.USER_ROLE_EXECUTOR}) {
                                        url+='&cnd[eu_eid]={$user_data.eid}';
                                    } else {
                                        url+='&cnd[ru_eid]={$user_data.eid}';
                                    }
                                    {literal}

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




    </script>
{/literal}
