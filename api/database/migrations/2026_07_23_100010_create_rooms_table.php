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
        Schema::create('rooms', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Owner
            |--------------------------------------------------------------------------
            */

            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Basic
            |--------------------------------------------------------------------------
            */

            $table->string('name',100);

            $table->string('cover')->nullable();

            $table->text('description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Category
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('country_code',5)->nullable();

            $table->string('language_code',10)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Type
            |--------------------------------------------------------------------------
            */

            $table->enum('type',[
                'VOICE',
                'PARTY',
                'RADIO',
            ])->default('VOICE');

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            $table->enum('status',[
                'ACTIVE',
                'CLOSED',
                'SUSPENDED',
            ])->default('ACTIVE');

            /*
            |--------------------------------------------------------------------------
            | Security
            |--------------------------------------------------------------------------
            */

            $table->string('password')->nullable();

            $table->boolean('is_private')
                ->default(false);

            /*
            |--------------------------------------------------------------------------
            | Seats
            |--------------------------------------------------------------------------
            */

            $table->unsignedTinyInteger('seat_count')
                ->default(8);

            /*
            |--------------------------------------------------------------------------
            | Online
            |--------------------------------------------------------------------------
            */

            $table->unsignedInteger('online_count')
                ->default(0);

            /*
            |--------------------------------------------------------------------------
            | Settings
            |--------------------------------------------------------------------------
            */

            $table->boolean('allow_guests')
                ->default(true);

            $table->boolean('allow_images')
                ->default(false);

            $table->boolean('allow_gifts')
                ->default(true);

            $table->boolean('allow_games')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Announcement
            |--------------------------------------------------------------------------
            */

            $table->string('welcome_message')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Statistics
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('exp')
                ->default(0);

            $table->unsignedInteger('level')
                ->default(1);

            $table->unsignedBigInteger('hot_score')
                ->default(0);

            /*
            |--------------------------------------------------------------------------
            | Flags
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Indexes
            |--------------------------------------------------------------------------
            */

            $table->index('owner_id');

            $table->index('category_id');

            $table->index('country_code');

            $table->index('language_code');

            $table->index('status');

            $table->index('online_count');

            $table->index('hot_score');

        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
