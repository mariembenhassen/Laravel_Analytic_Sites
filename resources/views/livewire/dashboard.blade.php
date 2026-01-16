<?php

use function Livewire\Volt\{state};

state([
    'visits' => 0,
    'message' => 'Welcome to your Analytics Dashboard!',
]);

?>

<div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                {{ $message }}
            </h1>

            <p class="text-lg text-gray-700 dark:text-gray-300">
                Live Visits Today: <span class="font-bold text-blue-600">{{ $visits }}</span>
            </p>
            <div class="mt-8">
                <livewire:charts.visits-chart />
            </div>
        </div>
    </div>
</div>
