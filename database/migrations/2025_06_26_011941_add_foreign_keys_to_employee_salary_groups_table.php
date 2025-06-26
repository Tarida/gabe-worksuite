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
        Schema::table('employee_salary_groups', function (Blueprint $table) {
            $table->foreign(['salary_group_id'])->references(['id'])->on('salary_groups')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_salary_groups', function (Blueprint $table) {
            $table->dropForeign('employee_salary_groups_salary_group_id_foreign');
            $table->dropForeign('employee_salary_groups_user_id_foreign');
        });
    }
};
