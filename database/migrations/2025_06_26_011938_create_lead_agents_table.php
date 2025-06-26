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
        Schema::create('lead_agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('lead_agents_company_id_foreign');
            $table->unsignedInteger('user_id')->index('lead_agents_user_id_foreign');
            $table->unsignedInteger('lead_category_id')->nullable()->index('lead_agents_lead_category_id_foreign');
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->unsignedInteger('added_by')->nullable()->index('lead_agents_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('lead_agents_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_agents');
    }
};
