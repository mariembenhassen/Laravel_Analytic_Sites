<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use App\Models\Site;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function store(Request $request)
    {
        $key = $request->query('key');

        $site = Site::where('tracking_key', $key)->first();

        if (! $site) {
            return response()->json(['error' => 'Invalid tracking key'], 403);
        }

        Metric::create([
            'site_id' => $site->id,
            'page_url' => $request->input('page_url'),
            'device_type' => $request->input('device_type'),
            'browser' => $request->input('browser'),
            'session_duration' => 0, // can be improved later
            'visits' => 1,
        ]);

        return response()->json(['status' => 'tracked']);
    }
}
