<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_mics', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Relations
            |--------------------------------------------------------------------------
            */

            $table->foreignId('room_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Mic
            |--------------------------------------------------------------------------
            */

            $table->unsignedTinyInteger('position');

            $table->enum('status', [
                'EMPTY',
                'BUSY',
                'LOCKED',
                'RESERVED',
            ])->default('EMPTY');

            /*
            |--------------------------------------------------------------------------
            | Permissions
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_muted')
                ->default(false);

            $table->boolean('is_locked')
                ->default(false);

            $table->boolean('is_vip_only')
                ->default(false);

            /*
            |--------------------------------------------------------------------------
            | Audio
            |--------------------------------------------------------------------------
            */

            $table->unsignedTinyInteger('volume')
                ->default(100);

            $table->unsignedTinyInteger('effect_level')
                ->default(0);

            /*
            |--------------------------------------------------------------------------
            | Decoration
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('frame_id')
                ->nullable();

            $table->unsignedBigInteger('effect_id')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Statistics
            |--------------------------------------------------------------------------
            */

            $table->unsignedInteger('total_seconds')
                ->default(0);

            $table->timestamp('occupied_at')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Indexes
            |--------------------------------------------------------------------------
            */

            $table->unique([
                'room_id',
                'position'
            ]);

            $table->index('room_id');
            $table->index('user_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_mics');
    }
};
