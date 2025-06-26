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
        Schema::create('recruit_selected_salary_components', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_selected_salary_components_company_id_foreign');
            $table->unsignedInteger('rss_id')->nullable()->index('recruit_selected_salary_components_rss_id_foreign');
            $table->unsignedInteger('salary_component_id')->nullable();
            $table->string('component_name')->nullable();
            $table->enum('component_type', ['earning', 'deduction'])->nullable();
            $table->string('component_value')->nullable();
            $table->enum('value_type', ['fixed', 'percent', 'basic_percent', 'variable'])->default('variable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_selected_salary_components');
    }
};
