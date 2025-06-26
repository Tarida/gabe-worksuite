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
        Schema::table('overtime_policy_employees', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['overtime_policy_id'])->references(['id'])->on('overtime_policies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('overtime_policy_employees', function (Blueprint $table) {
            $table->dropForeign('overtime_policy_employees_company_id_foreign');
            $table->dropForeign('overtime_policy_employees_overtime_policy_id_foreign');
            $table->dropForeign('overtime_policy_employees_user_id_foreign');
        });
    }
};
