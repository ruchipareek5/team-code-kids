$('#graphs').ready(function(){


$.getJSON('http://127.0.0.1:8000/grievance/ombudsman/chart/college', function(data) {
    //top5_institute
Highcharts.chart('top5_institute', {
    chart: {
        type: 'column'
    },
    title: {
        text:'Top 5 College having maximum filled Grievance'
    },
    xAxis: {
        categories: data.college
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
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'pending',
        data:data.pending,
        color: 'rgb(131,190,41)'
    },
    {
        name: 'Escalated',
        data:data.escalated,
        color: 'rgb(1,156,183)'
    },
    {
        name: 'Resolved',
        data:data.resolved,
        color : 'rgb(239, 96, 64)'
    }]
});
});


var selectVal = $('.select select').val();
$('.select select').on('change',function(){
   selectVal = $('.select select').val();
   loadChart();
})
// grievance_type
function loadChart() {
 
$.getJSON('http://127.0.0.1:8000/grievance/ombudsman/chart/college/'+selectVal, function(data) {

Highcharts.chart('grievance_type_institute', {
    chart: {
        type: 'column'
    },
    title: {
        text:'Department  Wise Grievance registered'
    },
    xAxis: {
        categories:data.message.status,
        title: {
            text: 'Department'
        }
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
    legend: {
        align: 'right',
        layout: 'vertical',
        verticalAlign: 'top',
        x: -20,
        y: 60,
        floating:true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {

            dataLabels: {
                enabled: false,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    credits: {
        enabled: false
    },
    series:data.message.data
});
});

}

loadChart();


// grievance_yearwise
$.getJSON('http://127.0.0.1:8000/grievance/ombudsman/chart/year', function(data) {

Highcharts.chart('grievance_yearwise', {
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

// greivance tpe
$.getJSON('http://127.0.0.1:8000/grievance/ombudsman/chart/department', function(data) {
Highcharts.chart('grievance_type', {
   chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 0
        }
    },
    title: {
        text: 'Types of Grievance'
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
        'data': data[0]
    }]
});
});
// api end
});
// jquery end
