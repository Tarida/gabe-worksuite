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
        Schema::create('overtime_policy_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('overtime_policy_employees_company_id_foreign');
            $table->unsignedInteger('user_id')->index('overtime_policy_employees_user_id_foreign');
            $table->unsignedBigInteger('overtime_policy_id')->index('overtime_policy_employees_overtime_policy_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime_policy_employees');
    }
};
