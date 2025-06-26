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
        Schema::create('employee_leave_quota_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index('employee_leave_quotas_user_id_foreign');
            $table->unsignedInteger('leave_type_id')->index('employee_leave_quotas_leave_type_id_foreign');
            $table->double('no_of_leaves', null, 0);
            $table->double('leaves_used', null, 0)->default(0);
            $table->double('leaves_remaining', null, 0)->default(0);
            $table->date('for_month');
            $table->timestamps();
            $table->double('overutilised_leaves', null, 0)->default(0);
            $table->double('unused_leaves', null, 0)->default(0);
            $table->double('carry_forward_leaves', null, 0)->default(0);
            $table->boolean('carry_forward_applied')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_leave_quota_histories');
    }
};
