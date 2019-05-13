<?php
require "header.php";


?>

<Center><h1>Player Scoredcard Progress</h1></Center>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Malahide Golf CLub - 18 Hole Sunday Singles'
    },
    subtitle: {
        text: 'Source: TapInGolf.com'
    },
    xAxis: [{
        categories: ['24th February', '3rd March', '10th March', '17th March', '24th March', '31st March',
            '7th April', '14th April', '21st April', '28th April', '5th May', '12th May'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: 'CSS',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Course Standard Scratch',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        title: {
            text: 'Stableford Points',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: 'Points',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    series: [{
        name: 'Stableford Points',
        type: 'column',
        yAxis: 1,
        data: [27, 29, 34, 31, 37, 33, 39, 42, 34, 33, 30, 29],
        //tooltip: {
            //valueSuffix: ' mm'
        //}

    }, {
        name: 'Course Standard Scratch',
        type: 'spline',
        data: [36, 35, 37, 36, 35, 36, 37, 36, 36, 37, 34, 38],
        //tooltip: {
            //valueSuffix: '°C'
        //}
    }]
});
</script>
