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
        Schema::table('deals', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['agent_id'])->references(['id'])->on('lead_agents')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['category_id'])->references(['id'])->on('lead_category')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['lead_id'])->references(['id'])->on('leads')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['lead_pipeline_id'])->references(['id'])->on('lead_pipelines')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['pipeline_stage_id'])->references(['id'])->on('pipeline_stages')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropForeign('deals_added_by_foreign');
            $table->dropForeign('deals_agent_id_foreign');
            $table->dropForeign('deals_category_id_foreign');
            $table->dropForeign('deals_company_id_foreign');
            $table->dropForeign('deals_currency_id_foreign');
            $table->dropForeign('deals_last_updated_by_foreign');
            $table->dropForeign('deals_lead_id_foreign');
            $table->dropForeign('deals_lead_pipeline_id_foreign');
            $table->dropForeign('deals_pipeline_stage_id_foreign');
        });
    }
};
