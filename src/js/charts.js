// Charts
var chartResolucion,
    chartGenero,
    chartEstandar,
    chartEstado,
    chartMigrante,
    chartMedio;
var GRAFICAS = window.GRAFICAS || {};

GRAFICAS.app = (function($, window, document, undefined){

    var getGraficas = function(){

        var datos = {};
        GLOBAL.app.sendJson("BLL/index.php?fn=graficas", datos, function(response){
            if(response.success){
                console.log(response.estado.output);

                chartResolucion.series[0].setData(response.estatus.output);
                chartGenero.series[0].setData(response.genero.output);
                chartEstandar.series[0].setData(response.estandar.output);
                chartMedio.series[0].setData(response.medio.output);
                chartEstado.series[0].setData(response.estado.output);                
            }
        });
    }

    return{
        getGraficas : getGraficas
    }

}($, window, document, undefined));

$(document).ready(function () {

    // Build the chart
    chartResolucion = Highcharts.chart('resolucion', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Porcentaje de resolución'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Atendido',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'En Trámite',
                y: 10.38
            }, {
                name: 'Pendiente',
                y: 4.77
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
                    enabled: false
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
                    enabled: false
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
                    enabled: false
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
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
                format: '{point.y:.1f}%'
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