<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    protected $fillable = [
        'site_id',
        'page_url',
        'device_type',
        'browser',
        'session_duration',
        'visits',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
