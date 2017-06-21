// Charts
var chartResolucion,
    chartGenero,
    chartEstandar,
    chartEstado,
    chartMigrante,
    chartMedio,
    chartEdad,
    chartMedioEntero,
    chartSecretaria,
    chartEscolaridad,
    chartOcupacion,
    chartSolicitanteType,
    chartEstandares;
var GRAFICAS = window.GRAFICAS || {};

GRAFICAS.app = (function($, window, document, undefined){

    var getGraficas = function(){
        $("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});
        var datos = {};
        datos["tipoFecha"] = $("input[name=rdioRepFecha]:checked").val();       
        datos["txtFechaExacta"] = $("#txtFechaExacta").val();     
        datos["txtFechaInicial"] = $("#txtFechaInicial").val();
        datos["txtFechaFinal"] = $("#txtFechaFinal").val();
        GLOBAL.app.sendJson("BLL/index.php?fn=graficas", datos, function(response){
            if(response.success){
                console.log(response.estado.output);
                //chartResolucion.series[0].setData(response.estatus.output);
                chartGenero.series[0].setData(response.genero.output);
                chartEstandar.series[0].setData(response.estandar.output);
                chartMedio.series[0].setData(response.medio.output);
                chartEstado.series[0].setData(response.estado.output);   
                chartEdad.series[0].setData(response.edad.output);
                chartMigrante.series[0].setData(response.migrante.output);
                chartMedioEntero.series[0].setData(response.medioEntero.output);
                chartSecretaria.series[0].setData(response.secretaria.output);
                chartEscolaridad.series[0].setData(response.escolaridad.output);
                chartOcupacion.series[0].setData(response.ocupacion.output);
                chartSolicitanteType.series[0].setData(response.solicitanteType.output);
                chartEstandares.series[0].setData(response.estandares.output);
            }
        });
        GLOBAL.app.closeLoadingModal();
    }

    var initChart = function(chart, name, title){
        chart = Highcharts.chart(name, {
            chart: {
                type: 'column'
            },
            title: {
                text: title
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total percent market share'
                }
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            }
        });
    }

    return{
        getGraficas : getGraficas,
        initChart : initChart
    }

}($, window, document, undefined));


$("#btnGraficas").on("click", function(){          
    GRAFICAS.app.getGraficas();     
})

$(document).ready(function () {
	/*
    GRAFICAS.app.initChart(chartEdad, 'edad', 'Edad');
    GRAFICAS.app.initChart(chartMedioEntero, 'medioEntero', 'Medio por el que se enteró de CONOCER');
    GRAFICAS.app.initChart(chartSecretaria, 'secretaria', 'Dependecias públicas desde las que se consulta');
    GRAFICAS.app.initChart(chartEscolaridad, 'escolaridad', 'Escolaridad');
    GRAFICAS.app.initChart(chartOcupacion, 'ocupacion', 'Ocupación');
	*/
    // Build the chart
    // chartResolucion = Highcharts.chart('resolucion', {
    //     chart: {
    //         plotBackgroundColor: null,
    //         plotBorderWidth: null,
    //         plotShadow: false,
    //         type: 'pie'
    //     },
    //     title: {
    //         text: 'Porcentaje de resolución'
    //     },
    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    //     },
    //     plotOptions: {
    //         pie: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             dataLabels: {
    //                 enabled: true,
    //                 format: '<b>{point.name}</b>: {point.percentage:.1f} %',
    //                 style: {
    //                     color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
    //                 }
    //             },
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Brands',
    //         colorByPoint: true,
    //         data: [{
    //             name: 'Atendido',
    //             y: 24.03,
    //             sliced: true,
    //             selected: true
    //         }, {
    //             name: 'En Trámite',
    //             y: 10.38
    //         }, {
    //             name: 'Pendiente',
    //             y: 4.77
    //         }]
    //     }]
    // });

    chartSolicitanteType = Highcharts.chart('solicitanteType', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Tipo de solicitante'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Correo electrónico',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Chat',
                y: 10.38
            }, {
                name: 'Telefónica',
                y: 10.38
            }, {
                name: 'Personal',
                y: 10.38
            }]
        }]
    });

    chartGenero = Highcharts.chart('genero', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Genero'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Masculino',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Femenimo',
                y: 10.38
            }]
        }]
    });

    chartEstandar = Highcharts.chart('graficaConEstandar', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Cuenta con estandar'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Si',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'No',
                y: 10.38
            }]
        }]
    });
    
    chartMedio = Highcharts.chart('graficaViaAtencion', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Vía de atención'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Correo electrónico',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Chat',
                y: 10.38
            }, {
                name: 'Telefónica',
                y: 10.38
            }, {
                name: 'Personal',
                y: 10.38
            }]
        }]
    });

    chartMigrante = Highcharts.chart('graficaMigrante', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Es migrante'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Correo electrónico',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Chat',
                y: 10.38
            }, {
                name: 'Telefónica',
                y: 10.38
            }, {
                name: 'Personal',
                y: 10.38
            }]
        }]
    });

    chartEstado = Highcharts.chart('graficaEstado', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Estado'
        },
       tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
        },
        plotOptions: {
      series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'CDMX',
                y: 24.03,
                drilldown: 'CDMX' 
            }, {
                name: 'Nuevo León',
                y: 10.38,
                drilldown: 'Nuevo León' 
            }, {
                name: 'Jalisco',
                y: 10.38,
                drilldown: 'Jalisco'
            }, {
                name: 'Estado de México',
                y: 10.38,
                drilldown: 'Estado de México'
            }]
        }]
    });
	
	chartEdad = Highcharts.chart('edad', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Edad'
        },
       tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
        },
        plotOptions: {
      series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'CDMX',
                y: 24.03,
                drilldown: 'CDMX' 
            }, {
                name: 'Nuevo León',
                y: 10.38,
                drilldown: 'Nuevo León' 
            }, {
                name: 'Jalisco',
                y: 10.38,
                drilldown: 'Jalisco'
            }, {
                name: 'Estado de México',
                y: 10.38,
                drilldown: 'Estado de México'
            }]
        }]
    });
	
	chartMedioEntero = Highcharts.chart('medioEntero', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Medio por el que se enteró de CONOCER'
        },
       tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
        },
        plotOptions: {
      series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'CDMX',
                y: 24.03,
                drilldown: 'CDMX' 
            }, {
                name: 'Nuevo León',
                y: 10.38,
                drilldown: 'Nuevo León' 
            }, {
                name: 'Jalisco',
                y: 10.38,
                drilldown: 'Jalisco'
            }, {
                name: 'Estado de México',
                y: 10.38,
                drilldown: 'Estado de México'
            }]
        }]
    });


	chartSecretaria = Highcharts.chart('secretaria', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Dependecias públicas desde las que se consulta'
        },
       tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
        },
        plotOptions: {
      series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'CDMX',
                y: 24.03,
                drilldown: 'CDMX' 
            }, {
                name: 'Nuevo León',
                y: 10.38,
                drilldown: 'Nuevo León' 
            }, {
                name: 'Jalisco',
                y: 10.38,
                drilldown: 'Jalisco'
            }, {
                name: 'Estado de México',
                y: 10.38,
                drilldown: 'Estado de México'
            }]
        }]
    });

	chartEscolaridad = Highcharts.chart('escolaridad', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Escolaridad'
        },
       tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
        },
        plotOptions: {
      series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'CDMX',
                y: 24.03,
                drilldown: 'CDMX' 
            }, {
                name: 'Nuevo León',
                y: 10.38,
                drilldown: 'Nuevo León' 
            }, {
                name: 'Jalisco',
                y: 10.38,
                drilldown: 'Jalisco'
            }, {
                name: 'Estado de México',
                y: 10.38,
                drilldown: 'Estado de México'
            }]
        }]
    });	
	chartOcupacion = Highcharts.chart('ocupacion', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Ocupación'
        },
       tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
        },
        plotOptions: {
      series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'CDMX',
                y: 24.03,
                drilldown: 'CDMX' 
            }, {
                name: 'Nuevo León',
                y: 10.38,
                drilldown: 'Nuevo León' 
            }, {
                name: 'Jalisco',
                y: 10.38,
                drilldown: 'Jalisco'
            }, {
                name: 'Estado de México',
                y: 10.38,
                drilldown: 'Estado de México'
            }]
        }]
    });
chartEstado = Highcharts.chart('graficaEstado', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Estado'
        },
       tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
        },
        plotOptions: {
      series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'CDMX',
                y: 24.03,
                drilldown: 'CDMX' 
            }, {
                name: 'Nuevo León',
                y: 10.38,
                drilldown: 'Nuevo León' 
            }, {
                name: 'Jalisco',
                y: 10.38,
                drilldown: 'Jalisco'
            }, {
                name: 'Estado de México',
                y: 10.38,
                drilldown: 'Estado de México'
            }]
        }]
    });
	
	chartEstandares = Highcharts.chart('graficaEstandares', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Estandares'
        },
       tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
        },
        plotOptions: {
      series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'CDMX',
                y: 24.03,
                drilldown: 'CDMX' 
            }, {
                name: 'Nuevo León',
                y: 10.38,
                drilldown: 'Nuevo León' 
            }, {
                name: 'Jalisco',
                y: 10.38,
                drilldown: 'Jalisco'
            }, {
                name: 'Estado de México',
                y: 10.38,
                drilldown: 'Estado de México'
            }]
        }]
    });

});
