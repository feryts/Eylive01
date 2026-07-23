<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_announcements', function (Blueprint $table) {

            $table->id();

            $table->foreignId('room_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('message',500);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->index('room_id');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_announcements');
    }
};
