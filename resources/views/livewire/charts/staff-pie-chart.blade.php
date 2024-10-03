<div id="chart"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        series: [44, 55, 13, 43, 22],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

{{-- @push('scripts') --}}
{{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Number of Staff'],
            ['Male', {{ $maleStaff }}],
            ['Female', {{ $femaleStaff }}],
        ]);

        var options = {
            title: 'Staff Gender Distribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('staffpiechart'));
        
        chart.draw(data, options);
    }
</script> --}}
{{-- @endpush --}}
