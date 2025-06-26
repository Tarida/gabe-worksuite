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
        Schema::create('recruit_salary_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_salary_structures_company_id_foreign');
            $table->unsignedInteger('recruit_job_application_id')->nullable()->index('recruit_salary_structures_recruit_job_application_id_foreign');
            $table->unsignedInteger('recruit_job_offer_letter_id')->nullable()->index('recruit_salary_structures_recruit_job_offer_letter_id_foreign');
            $table->text('salary_json')->nullable();
            $table->string('annual_salary')->nullable();
            $table->string('basic_salary')->nullable();
            $table->enum('basic_value_type', ['fixed', 'ctc_percent'])->nullable();
            $table->string('amount')->default('0');
            $table->double('fixed_allowance', null, 0)->default(0);
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_salary_structures');
    }
};
