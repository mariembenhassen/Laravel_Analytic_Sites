<?php

use function Livewire\Volt\{state};
use App\Models\Site;

state([
    'visits' => 0,
    'message' => 'Welcome to your Analytics Dashboard!',
    'site' => auth()->user()->sites()->first(),  // load first site automatically
    'sites' => auth()->user()->sites()->get(),   // load all sites
    'selectedSiteId' => null,
]);

// Optional: if you want to run something when selected site changes
$selectSite = function ($siteId) {
    $this->selectedSiteId = $siteId;
    $this->site = $this->sites->find($siteId);
};

?>

<div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                {{ $message }}
            </h1>

            <livewire:add-site />

            @if ($sites->isNotEmpty())
                <div class="mt-8">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        View Analytics for:
                    </label>
                    <select
                        wire:model.live="selectedSiteId"
                        wire:change="selectSite($event.target.value)"
                        class="block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                        @foreach ($sites as $s)
                            <option value="{{ $s->id }}">{{ $s->name }} ({{ $s->url }})</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if ($site)
                <div class="mt-8">
                    <h2 class="text-xl font-semibold mb-4">
                        Analytics for: {{ $site->name }} ({{ $site->url }})
                    </h2>
                    <livewire:charts.visits-chart :site="$site" />
                </div>
            @else
                <p class="mt-8 text-gray-600 dark:text-gray-400">
                    {{ $sites->isEmpty() ? 'Add your first website above to see analytics.' : 'Select a site above.' }}
                </p>
            @endif
        </div>
    </div>
</div>
