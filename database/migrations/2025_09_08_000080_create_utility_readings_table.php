<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('utility_readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->string('period');
            $table->decimal('electricity_prev', 10, 2)->default(0);
            $table->decimal('electricity_curr', 10, 2)->default(0);
            $table->decimal('kwh_rate', 10, 4)->default(0);
            $table->decimal('computed_amount', 10, 2)->default(0);
            $table->timestamps();
            $table->unique(['room_id','period']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('utility_readings');
    }
};
