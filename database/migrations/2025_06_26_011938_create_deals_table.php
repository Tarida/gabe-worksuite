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
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('deals_company_id_foreign');
            $table->string('name')->nullable();
            $table->integer('column_priority')->default(0);
            $table->unsignedBigInteger('lead_pipeline_id')->nullable()->index('deals_lead_pipeline_id_foreign');
            $table->unsignedInteger('pipeline_stage_id')->nullable()->index('deals_pipeline_stage_id_foreign');
            $table->unsignedInteger('lead_id')->nullable()->index('deals_lead_id_foreign');
            $table->date('close_date')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable()->index('leads_agent_id_foreign');
            $table->unsignedInteger('category_id')->nullable()->index('deals_category_id_foreign');
            $table->enum('next_follow_up', ['yes', 'no'])->default('yes');
            $table->double('value', 30, 2)->nullable()->default(0);
            $table->longText('note')->nullable();
            $table->text('hash')->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('leads_currency_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('deals_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('deals_last_updated_by_foreign');
            $table->timestamps();
            $table->integer('deal_watcher')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
