<?php
use function Livewire\Volt\{state, mount, on};
use App\Models\Metric;
use Carbon\Carbon;

state([
    'title' => 'Visits This Week',
    'categories' => [],
    'data' => [],
    'site' => null,
]);

mount(function ($site) {
    $this->site = $site;

    $metrics = Metric::where('site_id', $site->id)
        ->where('recorded_at', '>=', now()->subDays(6))
        ->groupByRaw('DATE(recorded_at)')
        ->selectRaw('DATE(recorded_at) as date, COUNT(*) as total_views')
        ->orderBy('date')
        ->get();

    $this->categories = $metrics
        ->pluck('date')
        ->map(fn($d) => Carbon::parse($d)->format('D'))
        ->toArray();

    $this->data = $metrics->pluck('total_views')->toArray();

    // Listen for new metrics
    on([
        "echo-private:site.{$this->site->id},NewMetricRecorded" => function () {
            $metrics = Metric::where('site_id', $this->site->id)
                ->where('recorded_at', '>=', now()->subDays(6))
                ->groupByRaw('DATE(recorded_at)')
                ->selectRaw('DATE(recorded_at) as date, COUNT(*) as total_views')
                ->orderBy('date')
                ->get();

            $this->categories = $metrics
                ->pluck('date')
                ->map(fn($d) => Carbon::parse($d)->format('D'))
                ->toArray();

            $this->data = $metrics->pluck('total_views')->toArray();
        }
    ]);
});
?>
<div wire:ignore id="visitsChart"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener('livewire:init', () => {
        const el = document.querySelector("#visitsChart");
        const chart = new ApexCharts(el, {
            chart: { type: 'line', height: 350 },
            series: [{ name: 'Visits', data: @js($data) }],
            xaxis: { categories: @js($categories) },
            stroke: { curve: 'smooth', width: 2 },
            colors: ['#3b82f6'],
            title: { text: '{{ $title }}', align: 'center', style: { fontSize: '16px' } },
        });
        chart.render();

        // Update chart whenever Volt state updates
        Livewire.hook('message.processed', () => {
            chart.updateOptions({
                series: [{ data: @js($data) }],
                xaxis: { categories: @js($categories) },
            });
        });
    });
</script>

