<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_room_tag', function (Blueprint $table) {

            $table->id();

            $table->foreignId('room_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('room_tag_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unique([
                'room_id',
                'room_tag_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_room_tag');
    }
};
