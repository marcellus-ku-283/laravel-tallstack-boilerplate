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
            $table->string('momentum_id', 128)->nullable();
            $table->string('momentum_user_key', 255)->nullable();
            $table->string('role', 16)->default('client'); // admin, client
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('email', 255)->unique()->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('pin', 6)->nullable();
            $table->float('balance', 16, 2)->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('block')->default(false);
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
