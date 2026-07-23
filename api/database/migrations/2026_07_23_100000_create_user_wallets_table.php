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
        Schema::create('user_wallets', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedBigInteger('coins')->default(0);

            $table->unsignedBigInteger('diamonds')->default(0);

            $table->unsignedBigInteger('total_recharge')->default(0);

            $table->unsignedBigInteger('total_sent')->default(0);

            $table->unsignedBigInteger('total_received')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_wallets');
    }
};
