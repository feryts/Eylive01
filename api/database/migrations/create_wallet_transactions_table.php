<?php

use App\Enums\WalletTransactionType;
use App\Enums\WalletType;
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
        Schema::create('wallet_transactions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('wallet_type',20);

            $table->string('transaction_type',30);

            $table->bigInteger('amount');

            $table->bigInteger('balance_before');

            $table->bigInteger('balance_after');

            $table->string('reference')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();

            $table->index('user_id');

            $table->index('wallet_type');

            $table->index('transaction_type');

            $table->index('created_at');

        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
