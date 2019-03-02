$('#graphs').ready(function(){
var selectVal = $('.select select').val();
$('.select select').on('change',function(){
   selectVal = $('.select select').val();
   loadChart();
})
// grievance_type
function loadChart() {
 
$.getJSON(baseUrl+'principal/chart/status/'+selectVal, function(data) {
//graph color options
Highcharts.setOptions({
        colors: ['rgb(41, 184, 209)', 'rgb(38, 122, 239)','rgb(131,190,41)', 'rgb(247, 103, 37)', 'rgb(221, 172, 24)','rgb(132, 144, 249)','rgb(234, 140, 51)','rgb(82, 216, 115)'],
        plotOptions: {
            column: {
                colorByPoint: true
            }
        }

    });
Highcharts.chart('grievance_type_committee', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 0
        }
    },
    title: {
        text: 'Types of Grievance Committee Wise'
    },
    plotOptions: {
         series: {
            dataLabels: {
                enabled: true,
                formatter: function() {
                    return Math.round(this.percentage*100)/100 + ' %';
                },
                distance: 15,
                
            }
        },
        pie: {
            innerSize:70,
            depth: 50,
            dataLabels: {
                enabled: false,
                format: '{point.percentage:.1f}%',
                 style:{
                    textTransform:'uppercase'
                }           
            },
            showInLegend:true,
        },
        
        
    },
    legend: {
        align: 'right',
        layout: 'vertical',
        verticalAlign: 'top',
        x: -20,
        y: 60,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false,
        

    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Total',
        'data': data[0]
    }]
});
});

}

loadChart();


//grievance Yearwise
$.getJSON(baseUrl+'principal/chart/year', function(data) {

Highcharts.chart('top5_committeeWise', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Yearwise filled Grievances'
    },
    xAxis: {
        categories: data.year
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Grievance Count'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
        }
    },
    
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: false,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Filled Grievance',
        data: data.count
    }]
});
});
// grievance_yearwise
// $.getJSON(baseUrl+'principal/chart/committeewise', function(data) {
// Highcharts.chart('top5_committeeWise', {
//     chart: {
//         type: 'column'
//     },
//     title: {
//         text:'Top 5 Course Wise Grievance registered'
//     },
//     xAxis: {
//         categories:data.message.committee,
//         title: {
//             text: 'Committee'
//         }
//     },
//     yAxis: {
//         min: 0,
//         title: {
//             text: 'Grievance Count'
//         },
//         stackLabels: {
//             enabled: true,
//             style: {
//                 fontWeight: 'bold',
//                 color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
//             }
//         }
//     },
//     legend: {
//         align: 'right',
//         layout: 'vertical',
//         verticalAlign: 'top',
//         x: -20,
//         y: 60,
//         floating:true,
//         backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
//         borderColor: '#CCC',
//         borderWidth: 1,
//         shadow: false
//     },
//     tooltip: {
//         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
//             '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
//         footerFormat: '</table>',
//         shared: true,
//         useHTML: true
//     },
//     plotOptions: {
//         column: {

//             dataLabels: {
//                 enabled: false,
//                 color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
//             }
//         }
//     },
//     credits: {
//         enabled: false
//     },
//     series:data.message.all_data
// });
// });

// top5_state
$.getJSON(baseUrl+'principal/chart/type', function(data) {
Highcharts.chart('grievance_type', {
   chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 0
        }
    },
    title: {
        text: 'Types of Grievance Committee Wise'
    },
    plotOptions: {
         series: {
            dataLabels: {
                enabled: true,
                formatter: function() {
                    return Math.round(this.percentage*100)/100 + ' %';
                },
                distance: 15,
                
            }
        },
        pie: {
            innerSize:70,
            depth: 50,
            dataLabels: {
                enabled: false,
                format: '{point.percentage:.1f}%'
                
            },
            showInLegend:true,
        },
        
        
    },
    legend: {
        align: 'right',
        layout: 'vertical',
        verticalAlign: 'top',
        x: -20,
        y: 60,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false,

    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Total',
        'data': data
    }]
});
});
// api end
});
// jquery end
