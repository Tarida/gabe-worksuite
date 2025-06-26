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
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index();
            $table->unsignedInteger('project_id')->nullable()->index('project_milestones_project_id_foreign');
            $table->unsignedInteger('currency_id')->nullable()->index('project_milestones_currency_id_foreign');
            $table->string('milestone_title');
            $table->mediumText('summary');
            $table->double('cost', 16, 2);
            $table->enum('status', ['complete', 'incomplete'])->default('incomplete');
            $table->enum('add_to_budget', ['yes', 'no'])->default('no');
            $table->boolean('invoice_created');
            $table->integer('invoice_id')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('project_milestones_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('project_milestones_last_updated_by_foreign');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_milestones');
    }
};
