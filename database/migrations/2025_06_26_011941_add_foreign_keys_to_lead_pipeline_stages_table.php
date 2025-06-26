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
        Schema::table('lead_pipeline_stages', function (Blueprint $table) {
            $table->foreign(['lead_pipeline_id'])->references(['id'])->on('lead_pipelines')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['pipeline_stages_id'])->references(['id'])->on('pipeline_stages')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lead_pipeline_stages', function (Blueprint $table) {
            $table->dropForeign('lead_pipeline_stages_lead_pipeline_id_foreign');
            $table->dropForeign('lead_pipeline_stages_pipeline_stages_id_foreign');
        });
    }
};
