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
        Schema::create('salary_group_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('salary_group_components_company_id_foreign');
            $table->unsignedBigInteger('salary_group_id')->index('salary_group_components_salary_group_id_foreign');
            $table->unsignedBigInteger('salary_component_id')->index('salary_group_components_salary_component_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_group_components');
    }
};
