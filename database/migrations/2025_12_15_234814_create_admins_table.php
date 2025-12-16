<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            // Basic identity
            $table->string('name');
            $table->string('email')->unique();

            // Authentication
            $table->string('password');

            // Admin control
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();

            // Security
            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
