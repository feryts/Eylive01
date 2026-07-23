<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_mics', function (Blueprint $table) {

            $table->id();

            $table->foreignId('room_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('position');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->boolean('is_locked')
                ->default(false);

            $table->boolean('is_muted')
                ->default(false);

            $table->timestamps();

            $table->unique([
                'room_id',
                'position'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_mics');
    }
};
