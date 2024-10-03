<!-- resources/views/livewire/staff-pie-chart.blade.php -->

<div id="workpiechart"></div>

@push('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Number of Staff'],
            ['Upper', {{ $upperWork}}],
            ['Lower', {{ $lowerWork }}],
        ]);

        var options = {
            title: 'Work Office Distribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('workpiechart'));

        chart.draw(data, options);
    }
</script>
@endpush
