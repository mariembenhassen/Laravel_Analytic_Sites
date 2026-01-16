<?php

use function Livewire\Volt\{state};

state([
    'title' => 'Visits This Week',
    'categories' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    'data' => [120, 190, 150, 220, 180, 140, 210], // fake data
]);

?>

<div>
    <div id="visitsChart" class="w-full h-80"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const options = {
                chart: {
                    type: 'line',
                    height: 350,
                    animations: { enabled: true, easing: 'easeinout' },
                },
                series: [{
                    name: 'Visits',
                    data: @js($data)
                }],
                xaxis: {
                    categories: @js($categories)
                },
                stroke: {
                    curve: 'smooth',
                    width: 2,
                },
                title: {
                    text: '{{ $title }}',
                    align: 'center',
                    style: { fontSize: '16px' }
                },
                colors: ['#3b82f6'],
            };

            const chart = new ApexCharts(document.querySelector("#visitsChart"), options);
            chart.render();
        });
    </script>
</div>
