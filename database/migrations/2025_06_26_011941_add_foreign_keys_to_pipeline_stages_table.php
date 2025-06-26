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
        Schema::table('pipeline_stages', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['lead_pipeline_id'])->references(['id'])->on('lead_pipelines')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pipeline_stages', function (Blueprint $table) {
            $table->dropForeign('pipeline_stages_company_id_foreign');
            $table->dropForeign('pipeline_stages_lead_pipeline_id_foreign');
        });
    }
};
