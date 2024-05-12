Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Number of Flights toward catered cities',
        align: 'center'
    },
    

    series: [{
        name: 'Flights',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 74.77,
            sliced: true,
            selected: true
        },  {
            name: 'Edge',
            y: 12.82
        },  {
            name: 'Firefox',
            y: 4.63
        }, {
            name: 'Safari',
            y: 2.44
        }, {
            name: 'Internet Explorer',
            y: 2.02
        }, {
            name: 'Other',
            y: 3.28
        }]
    }]
});
