$('#graphs').ready(function(){


$.getJSON(baseUrl+'grievance/aicte/chart/college', function(data) {
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
        shadow: false,

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
        name: 'Pending',
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


// grievance_type
$.getJSON(baseUrl+'grievance/aicte/chart/department', function(data) {

//graph color options
Highcharts.setOptions({
        colors: ['rgb(41, 184, 209)', 'rgb(38, 122, 239)', 'rgb(247, 103, 37)', 'rgb(221, 172, 24)','rgb(132, 144, 249)','rgb(234, 140, 51)','rgb(82, 216, 115)'],
        plotOptions: {
            column: {
                colorByPoint: true
            }
        }

    });
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


// grievance_yearwise
$.getJSON(baseUrl+'grievance/aicte/chart/year', function(data) {

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

// top5_state
$.getJSON(baseUrl+'grievance/aicte/chart/state', function(data) {

Highcharts.chart('top5_state', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Top 5 state having maximum Grievance'
    },
    xAxis: {
        categories: data.state
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
        name: 'Total Grievance',
        data: data.total
    }]
    });
});
// api end
});
// jquery end
