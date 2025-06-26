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
        Schema::table('weekly_timesheets', function (Blueprint $table) {
            $table->foreign(['approved_by'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weekly_timesheets', function (Blueprint $table) {
            $table->dropForeign('weekly_timesheets_approved_by_foreign');
            $table->dropForeign('weekly_timesheets_company_id_foreign');
            $table->dropForeign('weekly_timesheets_user_id_foreign');
        });
    }
};
