<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_statistics', function (Blueprint $table) {

            $table->id();

            $table->foreignId('room_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedInteger('today_online')->default(0);

            $table->unsignedInteger('today_visitors')->default(0);

            $table->unsignedBigInteger('today_gifts')->default(0);

            $table->unsignedInteger('today_duration')->default(0);

            $table->unsignedBigInteger('weekly_gifts')->default(0);

            $table->unsignedBigInteger('monthly_gifts')->default(0);

            $table->unsignedBigInteger('total_gifts')->default(0);

            $table->unsignedBigInteger('hot_score')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_statistics');
    }
};
