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
        Schema::create('key_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('key_results_company_id_foreign');
            $table->unsignedBigInteger('objective_id')->index('key_results_objective_id_foreign');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('metrics_id')->nullable()->index('key_results_metrics_id_foreign');
            $table->double('target_value', 8, 2)->nullable();
            $table->double('current_value', 8, 2)->nullable();
            $table->double('original_current_value', 8, 2)->nullable();
            $table->double('key_percentage', 8, 2)->nullable();
            $table->date('last_check_in')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('key_results');
    }
};
