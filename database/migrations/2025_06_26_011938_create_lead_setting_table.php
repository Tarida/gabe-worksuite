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
        Schema::create('lead_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(false);
            $table->unsignedInteger('user_id')->index('lead_setting_user_id_foreign');
            $table->unsignedInteger('company_id')->nullable()->index('lead_setting_company_id_foreign');
            $table->timestamps();
            $table->tinyInteger('ticket_round_robin_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_setting');
    }
};
