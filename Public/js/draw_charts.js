  function RefreshChart() {
    var chart1 = $('#LATENCY_container').highcharts();
    var chart2 = $('#LOSS_container').highcharts();
    i = 0;
    do {
      chart1.addSeries({
      name: obj[i].alias_name,
      data: obj[i].rtt_avg
    });
      chart2.addSeries({
        name: obj[i].alias_name,
        data: obj[i].loss_percent
      });
      i++;
    } while (obj[i]);
  }
