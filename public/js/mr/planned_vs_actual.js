$.ajax({
    url: config.routes[0].plannedVsActual,
    method: 'GET',
    dataType: 'json',
    success: function (response) {
        // Pie Chart
        var chartPie = $('#planned-vs-actual-chart-pie');
        $.plot(chartPie, response,
            {
                colors: ['#86C67C', '#a93e49'],
                legend: {show: true},
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 1 / 2,
                            formatter: function (label, pieSeries) {
                                return '<div class="chart-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                            },
                            background: {opacity: 0.75, color: '#000000'}
                        }
                    }
                }
            });
    },
    error: function (msg) {
        console.log(msg.responseText);
    }
});