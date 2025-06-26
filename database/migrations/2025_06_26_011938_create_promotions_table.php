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
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('promotions_company_id_foreign');
            $table->unsignedInteger('employee_id')->nullable()->index('promotions_employee_id_foreign');
            $table->date('date')->nullable();
            $table->unsignedBigInteger('previous_designation_id')->nullable()->index('promotions_previous_designation_id_foreign');
            $table->unsignedBigInteger('current_designation_id')->nullable()->index('promotions_current_designation_id_foreign');
            $table->enum('send_notification', ['yes', 'no'])->default('no');
            $table->unsignedInteger('previous_department_id')->nullable()->index('promotions_previous_department_id_foreign');
            $table->unsignedInteger('current_department_id')->nullable()->index('promotions_current_department_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
