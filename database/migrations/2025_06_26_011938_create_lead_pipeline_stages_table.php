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
        Schema::create('lead_pipeline_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('lead_pipeline_id')->nullable()->index('lead_pipeline_stages_lead_pipeline_id_foreign');
            $table->unsignedInteger('pipeline_stages_id')->nullable()->index('lead_pipeline_stages_pipeline_stages_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_pipeline_stages');
    }
};
