<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 mb-4">
            <div class="bg-gray-400 w-80 h-40 m-8 static rounded-lg">
                <div class="bg-white w-80 h-40 hover:m-2 absolute rounded-lg shadow-lg hover:shadow-2xl transition-all duration-150 ease-out hover:ease-in">
                    <div class="m-4">
                        <h1 class="text-2xl font-bold">Number of Staffs</h1>
                        <hr class="my-4 rounded-2xl border-t-2">
                        <p class="text-xl">{{ $staffCount }}</p>
                    </div>
                </div>
            </div>
        
            <div class="bg-gray-400 w-80 h-40 m-8 static rounded-lg">
                <div class="bg-white w-80 h-40 hover:m-2 absolute rounded-lg shadow-lg hover:shadow-2xl transition-all duration-150 ease-out hover:ease-in">
                    <div class="m-4">
                        <h1 class="text-2xl font-bold">Number of Works</h1>
                        <hr class="my-4 rounded-2xl border-t-2">
                        <p class="text-xl">{{ $workCount }}</p>
                    </div>
                </div>
            </div>
        
            <div class="bg-gray-400 w-80 h-40 m-8 static rounded-lg">
                <div class="bg-white w-80 h-40 hover:m-2 absolute rounded-lg shadow-lg hover:shadow-2xl transition-all duration-150 ease-out hover:ease-in">
                    <div class="m-4">
                        <h1 class="text-2xl font-bold">Number of Schedules</h1>
                        <hr class="my-4 rounded-2xl border-t-2">
                        <p class="text-xl">{{ $scheduleCount }}</p>
                    </div>
                </div>
            </div>
        </div>        
        
        <div class="grid grid-cols-2 items-center gap-6">
            <div class="bg-white p-4 rounded-lg shadow-md" id="staff-pie-chart"></div>
            <div class="bg-white p-4 rounded-lg shadow-md" id="work-pie-chart"></div>
        </div>
    </div>

    <script>
        var staffOptions = {
            series: [{{ $totalMale }}, {{ $totalFemale }}],
            chart: {
                width: 380,
                type: 'pie',
            },
            colors: ['#5AB2FF', '#FF5580'], 
            labels: ['Male', 'Female'],
            title: {
                text: 'Staff Gender Distribution', // Title for the staff pie chart
                align: 'center',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold'
                }
            },
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
        var staffChart = new ApexCharts(document.querySelector("#staff-pie-chart"), staffOptions);
        staffChart.render();

        var workOptions = {
            series: [{{ $totalUpper }}, {{ $totalLower }}],
            chart: {
                width: 380,
                type: 'pie',
            },
            colors: ['#EEE4B1', '#5F374B'], 
            labels: ['Upper', 'Lower'],
            title: {
                text: 'Work Office Distribution', // Title for the work pie chart
                align: 'center',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold'
                }
            },
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

        var workChart = new ApexCharts(document.querySelector("#work-pie-chart"), workOptions);
        workChart.render();
    </script>

</x-app-layout>
