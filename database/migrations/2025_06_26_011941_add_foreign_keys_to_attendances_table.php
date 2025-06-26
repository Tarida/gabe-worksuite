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
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['employee_shift_id'])->references(['id'])->on('employee_shifts')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['location_id'])->references(['id'])->on('company_addresses')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign('attendances_added_by_foreign');
            $table->dropForeign('attendances_company_id_foreign');
            $table->dropForeign('attendances_employee_shift_id_foreign');
            $table->dropForeign('attendances_last_updated_by_foreign');
            $table->dropForeign('attendances_location_id_foreign');
            $table->dropForeign('attendances_user_id_foreign');
        });
    }
};
