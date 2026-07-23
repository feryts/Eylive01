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
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            // EyLive ID
            $table->string('ey_id', 20)->unique()->nullable();

            // Temel Bilgiler
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->unique();

            $table->string('email')->nullable()->unique();
            $table->string('phone', 20)->nullable()->unique();

            $table->timestamp('phone_verified_at')->nullable();

            $table->string('password')->nullable();

            // Sosyal Giriş
            $table->string('google_id')->nullable();
            $table->string('apple_id')->nullable();

            // Profil
            $table->string('avatar')->nullable();
            $table->date('birth_date')->nullable();

            $table->enum('gender', [
                'male',
                'female'
            ])->nullable();

            // Ülke
            $table->string('country',100)->nullable();

            // Para Sistemi
            $table->unsignedBigInteger('coins')->default(0);
            $table->unsignedBigInteger('diamonds')->default(0);

            // VIP
            $table->tinyInteger('vip_level')->default(0);
            $table->timestamp('vip_expired_at')->nullable();

            // Yayıncı
            $table->boolean('is_broadcaster')->default(false);
            $table->unsignedBigInteger('agency_id')->nullable();

            // Güven
            $table->tinyInteger('trust_score')->default(100);

            // Yasak
            $table->boolean('is_banned')->default(false);

            // Son giriş
            $table->ipAddress('last_login_ip')->nullable();
            $table->timestamp('last_login_at')->nullable();

            $table->rememberToken();

            $table->timestamps();

        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address',45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
