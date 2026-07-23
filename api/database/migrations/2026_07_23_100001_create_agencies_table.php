<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agencies', function (Blueprint $table) {

            $table->id();

            $table->string('name',100)->unique();

            $table->string('logo')->nullable();

            $table->text('description')->nullable();

            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->boolean('is_active')
                ->default(true);

            $table->unsignedInteger('members_count')
                ->default(0);

            $table->unsignedBigInteger('total_income')
                ->default(0);

            $table->timestamps();

            $table->index('owner_id');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
