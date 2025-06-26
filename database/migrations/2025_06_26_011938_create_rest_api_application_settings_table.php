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
        Schema::create('rest_api_application_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->integer('app_key')->unique();
            $table->string('app_secret', 60)->nullable();
            $table->unsignedInteger('authorized_employee_id')->nullable()->index('rest_api_application_settings_authorized_employee_id_foreign');
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rest_api_application_settings');
    }
};
