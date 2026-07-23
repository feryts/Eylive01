<?php

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Enums\VipLevel;
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
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('ey_id', 20)->unique();

            $table->string('username', 30)->unique();

            $table->string('phone', 20)->unique();

            $table->string('email')->nullable()->unique();

            $table->string('password');

            $table->string('avatar')->nullable();

            $table->enum('gender', ['male', 'female']);

            $table->string('country', 10)->nullable();

            $table->enum('vip_level', array_column(VipLevel::cases(), 'value'))
                ->default(VipLevel::NONE->value);

            $table->enum('role', array_column(UserRole::cases(), 'value'))
                ->default(UserRole::USER->value);

            $table->enum('status', array_column(UserStatus::cases(), 'value'))
                ->default(UserStatus::ACTIVE->value);

            $table->text('bio')->nullable();

            $table->date('birthday')->nullable();

            $table->timestamp('phone_verified_at')->nullable();

            $table->timestamp('last_login_at')->nullable();

            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
