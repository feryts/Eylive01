<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_members', function (Blueprint $table) {

            $table->id();

            $table->foreignId('room_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->boolean('is_host')
                ->default(false);

            $table->boolean('is_admin')
                ->default(false);

            $table->boolean('is_muted')
                ->default(false);

            $table->timestamp('joined_at');

            $table->timestamp('left_at')
                ->nullable();

            $table->timestamps();

            $table->unique([
                'room_id',
                'user_id'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_members');
    }
};
