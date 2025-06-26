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
        Schema::table('estimates', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['client_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['estimate_request_id'])->references(['id'])->on('estimate_requests')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estimates', function (Blueprint $table) {
            $table->dropForeign('estimates_added_by_foreign');
            $table->dropForeign('estimates_client_id_foreign');
            $table->dropForeign('estimates_company_id_foreign');
            $table->dropForeign('estimates_currency_id_foreign');
            $table->dropForeign('estimates_estimate_request_id_foreign');
            $table->dropForeign('estimates_last_updated_by_foreign');
            $table->dropForeign('estimates_project_id_foreign');
        });
    }
};
