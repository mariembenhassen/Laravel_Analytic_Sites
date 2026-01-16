<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function metrics()
    {
        return $this->hasMany(Metric::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
