<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('metric', 'metrics');
    }

    public function down(): void
    {
        Schema::rename('metrics', 'metric');
    }
};
