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
        Schema::create('rest_api_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_code')->nullable();
            $table->timestamp('supported_until')->nullable();
            $table->timestamp('purchased_on')->nullable();
            $table->string('license_type', 20)->nullable();
            $table->boolean('notify_update')->default(true);
            $table->timestamps();
            $table->string('fcm_key')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('rest_api_settings_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('rest_api_settings_last_updated_by_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rest_api_settings');
    }
};
