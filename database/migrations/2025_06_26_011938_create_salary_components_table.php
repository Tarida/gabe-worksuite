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
        Schema::create('salary_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('salary_components_company_id_foreign');
            $table->string('component_name');
            $table->enum('component_type', ['earning', 'deduction']);
            $table->string('component_value');
            $table->enum('value_type', ['fixed', 'percent', 'basic_percent', 'variable']);
            $table->timestamps();
            $table->double('weekly_value', null, 0)->default(0);
            $table->double('biweekly_value', null, 0)->default(0);
            $table->double('semimonthly_value', null, 0)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_components');
    }
};
