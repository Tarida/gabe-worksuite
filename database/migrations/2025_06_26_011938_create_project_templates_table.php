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
        Schema::create('project_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('project_templates_company_id_foreign');
            $table->string('project_name');
            $table->unsignedInteger('category_id')->nullable()->index('project_templates_category_id_foreign');
            $table->unsignedInteger('client_id')->nullable()->index('project_templates_client_id_foreign');
            $table->mediumText('project_summary')->nullable();
            $table->longText('notes')->nullable();
            $table->mediumText('feedback')->nullable();
            $table->enum('client_view_task', ['enable', 'disable'])->default('disable');
            $table->enum('allow_client_notification', ['enable', 'disable'])->default('disable');
            $table->enum('manual_timelog', ['enable', 'disable'])->default('disable');
            $table->timestamps();
            $table->integer('added_by')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_templates');
    }
};
