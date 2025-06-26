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
        Schema::create('webhooks_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('webhooks_requests_company_id_foreign');
            $table->unsignedBigInteger('webhooks_setting_id')->nullable()->index('webhooks_requests_webhooks_setting_id_foreign');
            $table->string('headers_key')->nullable();
            $table->string('headers_value')->nullable();
            $table->enum('request_type', ['headers', 'body'])->default('headers');
            $table->string('body_key')->nullable();
            $table->string('body_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhooks_requests');
    }
};
