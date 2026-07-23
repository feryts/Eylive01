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
        Schema::create('room_members', function (Blueprint $table) {

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
                ->constrained()
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Role
            |--------------------------------------------------------------------------
            */

            $table->enum('role', [
                'OWNER',
                'ADMIN',
                'HOST',
                'MEMBER',
                'GUEST',
            ])->default('MEMBER');

            /*
            |--------------------------------------------------------------------------
            | Presence
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_online')
                ->default(true);

            $table->boolean('is_on_mic')
                ->default(false);

            $table->boolean('is_muted')
                ->default(false);

            $table->boolean('is_deafened')
                ->default(false);

            $table->boolean('is_afk')
                ->default(false);

            /*
            |--------------------------------------------------------------------------
            | Device
            |--------------------------------------------------------------------------
            */

            $table->unsignedTinyInteger('mic_position')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Time
            |--------------------------------------------------------------------------
            */

            $table->timestamp('joined_at');

            $table->timestamp('left_at')
                ->nullable();

            $table->timestamp('last_activity_at')
                ->nullable();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Index
            |--------------------------------------------------------------------------
            */

            $table->unique([
                'room_id',
                'user_id'
            ]);

            $table->index('room_id');
            $table->index('user_id');
            $table->index('role');
            $table->index('is_online');
            $table->index('is_on_mic');
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_members');
    }
};
