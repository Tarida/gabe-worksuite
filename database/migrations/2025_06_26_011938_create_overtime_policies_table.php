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
        Schema::create('overtime_policies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('overtime_policies_company_id_foreign');
            $table->unsignedBigInteger('pay_code_id')->index('overtime_policies_pay_code_id_foreign');
            $table->boolean('working_days')->default(false);
            $table->string('name')->nullable();
            $table->boolean('week_end')->default(false);
            $table->boolean('holiday')->default(false);
            $table->integer('request_before_days')->nullable();
            $table->boolean('allow_reporting_manager')->default(false);
            $table->text('allow_roles')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime_policies');
    }
};
