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
        Schema::table('employee_details', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_address_id'])->references(['id'])->on('company_addresses')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['department_id'])->references(['id'])->on('teams')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['designation_id'])->references(['id'])->on('designations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['reporting_to'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_details', function (Blueprint $table) {
            $table->dropForeign('employee_details_added_by_foreign');
            $table->dropForeign('employee_details_company_address_id_foreign');
            $table->dropForeign('employee_details_company_id_foreign');
            $table->dropForeign('employee_details_department_id_foreign');
            $table->dropForeign('employee_details_designation_id_foreign');
            $table->dropForeign('employee_details_last_updated_by_foreign');
            $table->dropForeign('employee_details_reporting_to_foreign');
            $table->dropForeign('employee_details_user_id_foreign');
        });
    }
};
