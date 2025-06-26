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
        Schema::create('zoom_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('zoom_setting_company_id_foreign');
            $table->string('api_key', 50)->nullable();
            $table->string('secret_key', 50)->nullable();
            $table->timestamps();
            $table->string('meeting_app')->default('in_app');
            $table->string('secret_token')->nullable();
            $table->string('account_id')->nullable();
            $table->string('meeting_client_id')->nullable();
            $table->string('meeting_client_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_setting');
    }
};
