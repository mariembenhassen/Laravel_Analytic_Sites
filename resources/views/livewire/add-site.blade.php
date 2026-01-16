<?php

use function Livewire\Volt\{state};

state([
    'name' => '',
    'url'=>'',
    'success' => false,
    'trackingKey'=> null,
    ]);
$add = function () {
    $this->validate([
        'name' => 'required|string|max:255',
        'url' => 'required|url|unique:sites,url',
    ]);

    $site = auth()->user()->sites()->create([
        'name' => $this->name,
        'url' => $this->url,
        'tracking_key' => Str::random(32),
    ]);

    $this->trackingKey = $site->tracking_key;
    $this->success = true;
    $this->reset(['name', 'url']);
};

?>

<div class="mt-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Add Your Website</h2>

    @if ($success)
        <div class="mb-6 p-4 bg-green-100 ...">
            Site added successfully!
            <p>Your tracking key: <strong>{{ $trackingKey }}</strong></p>
            <p>Paste this script in the <code>&lt;head&gt;</code> of your website:</p>
            <pre>
&lt;script src="{{ url('/track.js') }}?key={{ $trackingKey }}"&gt;&lt;/script&gt;
            </pre>
        </div>
    @endif

    <form wire:submit="add">
        <!-- Site Name -->
        <input type="text" wire:model="name">
        @error('name') <span>{{ $message }}</span> @enderror

        <!-- Site URL -->
        <input type="url" wire:model="url">
        @error('url') <span>{{ $message }}</span> @enderror

        <button type="submit">Add Site</button>
    </form>
</div>
