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
        Schema::table('rest_api_application_settings', function (Blueprint $table) {
            $table->foreign(['authorized_employee_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rest_api_application_settings', function (Blueprint $table) {
            $table->dropForeign('rest_api_application_settings_authorized_employee_id_foreign');
        });
    }
};
