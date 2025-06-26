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
        Schema::create('webhooks_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('webhooks_logs_company_id_foreign');
            $table->unsignedBigInteger('webhooks_setting_id')->index('webhooks_logs_webhooks_setting_id_foreign');
            $table->string('method')->nullable();
            $table->string('action')->nullable();
            $table->string('webhook_for')->nullable();
            $table->text('raw_content')->nullable();
            $table->text('headers')->nullable();
            $table->text('response')->nullable();
            $table->integer('response_code')->nullable()->default(200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhooks_logs');
    }
};
