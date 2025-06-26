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
        Schema::table('promotions', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['current_department_id'])->references(['id'])->on('teams')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['current_designation_id'])->references(['id'])->on('designations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['employee_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['previous_department_id'])->references(['id'])->on('teams')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['previous_designation_id'])->references(['id'])->on('designations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropForeign('promotions_company_id_foreign');
            $table->dropForeign('promotions_current_department_id_foreign');
            $table->dropForeign('promotions_current_designation_id_foreign');
            $table->dropForeign('promotions_employee_id_foreign');
            $table->dropForeign('promotions_previous_department_id_foreign');
            $table->dropForeign('promotions_previous_designation_id_foreign');
        });
    }
};
