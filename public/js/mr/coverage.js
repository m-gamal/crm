var stats = null;
$.ajax({
    url: config.routes[0].coverage,
    method : 'GET',
    dataType: 'json',
    success: function (response) {
        $('#coverage_tab').on('shown.bs.tab', function (e) {
            // Pie Chart
            var chartPie = $('#chart-pie');
            $.plot(chartPie, response,
            {
                colors: ['#333333', '#a93e49', '#5b0202'],
                legend: {show: true},
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 1 / 2,
                            formatter: function(label, pieSeries) {
                                return '<div class="chart-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                            },
                            background: {opacity: 0.75, color: '#000000'}
                        }
                    }
                }
            });
        });
    },
    error: function (msg) {
        console.log(msg.responseText);
    }
});