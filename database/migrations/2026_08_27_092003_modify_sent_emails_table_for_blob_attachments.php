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
        Schema::table('sent_emails', function (Blueprint $table) {
            $table->dropColumn('attachment');
            $table->string('attachment_name')->nullable()->after('message');
            $table->string('attachment_mime')->nullable()->after('attachment_name');
            $table->longText('attachment_data')->nullable()->after('attachment_mime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sent_emails', function (Blueprint $table) {
            $table->dropColumn(['attachment_name', 'attachment_mime', 'attachment_data']);
            $table->string('attachment')->nullable()->after('message');
        });
    }
};
