<?php
require "header.php";

?>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>



<div id="containerchart" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>


<pre id="tsv" style="display:none"></pre>


<script>

Highcharts.chart('containerchart', {
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Pro Shop Sales. 2018'
  },
  subtitle: {
    text: 'Click the slices to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
  },
  plotOptions: {
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: {point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  "series": [
    {
      "name": "Sales 2018",
      "colorByPoint": true,
      "data": [
        {
          "name": "Golf Balls",
          "y": 28.20,
          "drilldown": "Golf Balls"
        },
        {
          "name": "Equipment",
          "y": 17.33,
          "drilldown": "Equipment"
        },
        {
          "name": "Lessons",
          "y": 11.23,
          "drilldown": "Lessons"
        },
        {
          "name": "Apparel",
          "y": 18.58,
          "drilldown": "Apparel"
        },
        {
          "name": "Accessories",
          "y": 13.02,
          "drilldown": "Accessories"
        },
        {
          "name": "Other",
          "y": 11.64,
          "drilldown": "Other"
        }
      ]
    }
  ],

  "drilldown": {
    "series": [
      {
        "name": "Golf Balls",
        "id": "Golf Balls",
        "data": [
          [
            "Top-Flite",
            5.1
          ],
          [
            "Taylormade",
            20.3
          ],
          [
            "Titleist",
            33.02
          ],
          [
            "Callaway",
            12.4
          ],
          [
            "Srixon",
            8.88
          ],
          [
            "Maxfli",
            17.56
          ]
        ]
      },
      {
        "name": "Equipment",
        "id": "Equipment",
        "data": [
          [
            "Drivers",
            19.02
          ],
          [
            "Fairway woods",
            7.36
          ],
          [
            "Irons",
           30.35
          ],
          [
            "Wedges",
            14.11
          ],
          [
            "Putters",
            20.1
          ],
        ]
      },
      {
        "name": "Lessons",
        "id": "Lessons",
        "data": [
          [
            "Driving",
            25.2
          ],
          [
            "Long irons",
            11.29
          ],
          [
            "Pitching",
            30.27
          ],
          [
            "Chipping",
            16.47
          ],
          [
          	"Putting",
          	22.1
          ]
        ]
      },
      {
        "name": "Apparel",
        "id": "Apparel",
        "data": [
          [
            "T-Shirts",
            35.39
          ],
          [
            "Golf Shoes",
            27.96
          ],
          [
            "Waterproof",
            16.36
          ],
          [
            "Golf Gloves",
            11.54
          ],
          [
            "Jackets",
            29.13
          ],
          [
            "Hats",
            5.2
          ]
        ]
      },
      {
        "name": "Accessories",
        "id": "Accessories",
        "data": [
          [
            "Training aids",
            18.6
          ],
          [
            "Golf Bags",
            33.5
          ],
          [
            "Tees & Markers",
            7.4
          ],
          [
            "Grips",
            22.1
          ]
        ]
      },
      {
        "name": "Other",
        "id": "Other",
        "data": [
          [
            "Trollys",
            38.96
          ],
          [
            "Range Finder",
           18.82
          ],
          [
            "GPS Tracker",
            27.50
          ]
        ]
      }
    ]
  }
});

</script>

