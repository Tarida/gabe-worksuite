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
        Schema::create('message_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('message_settings_company_id_foreign');
            $table->enum('allow_client_admin', ['yes', 'no'])->default('no');
            $table->enum('allow_client_employee', ['yes', 'no'])->default('no');
            $table->enum('restrict_client', ['yes', 'no'])->default('no');
            $table->timestamps();
            $table->boolean('send_sound_notification')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_settings');
    }
};
