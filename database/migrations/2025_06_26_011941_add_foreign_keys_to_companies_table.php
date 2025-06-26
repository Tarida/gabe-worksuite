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
        Schema::table('companies', function (Blueprint $table) {
            $table->foreign(['approved_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['default_task_status'])->references(['id'])->on('taskboard_columns')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['package_id'])->references(['id'])->on('packages')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('companies_approved_by_foreign');
            $table->dropForeign('companies_currency_id_foreign');
            $table->dropForeign('companies_default_task_status_foreign');
            $table->dropForeign('companies_last_updated_by_foreign');
            $table->dropForeign('companies_package_id_foreign');
        });
    }
};
