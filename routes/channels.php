<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Site;

Broadcast::channel('site.{siteId}', function ($user, $siteId) {
    logger()->info('Channel auth hit', [
        'user_id' => $user->id,
        'site_id' => $siteId,
    ]);

    return Site::where('id', $siteId)
        ->where('user_id', $user->id)
        ->exists();
});

