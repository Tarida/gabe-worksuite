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
        Schema::create('webhooks_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('webhooks_settings_company_id_foreign');
            $table->string('name');
            $table->string('webhook_for');
            $table->boolean('action')->nullable();
            $table->string('url')->nullable();
            $table->string('request_method')->nullable();
            $table->string('request_format')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('run_debug')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhooks_settings');
    }
};
