function draw_LATENCY() {
  $('#LATENCY_container').highcharts({
    chart: {
      type: 'spline',
      renderTo: 'LATENCY_container'
    },
    title: {
      text: '服务器网络延迟',
      x: -20 // center
    },
    subtitle: {
      text: 'Source: pi.catscarlet.com',
      x: -20
    },
    xAxis: {
      categories: obj[0].DATETIME
      //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
      title: {
        text: '延迟(ms)'
      },
      value: 0,
      width: 1,
      color: '#808080'
    },
    tooltip: {
      valueSuffix: 'ms'
    },
    legend: {
      enabled: true,
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
      borderWidth: 0
    },
    plotOptions: {
      spline: {
        lineWidth: 2,
        states: {
          hover: {
            lineWidth: 5
          }
        },
        marker: {
          enabled: false
        },

      }
    },
    /*
    series: [{
      name: obj.server_name,
      data: obj.rtt_avg
    }
]
    */
  });
};
