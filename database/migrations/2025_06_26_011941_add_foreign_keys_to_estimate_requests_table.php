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
        Schema::table('estimate_requests', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['client_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['estimate_id'])->references(['id'])->on('estimates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estimate_requests', function (Blueprint $table) {
            $table->dropForeign('estimate_requests_added_by_foreign');
            $table->dropForeign('estimate_requests_client_id_foreign');
            $table->dropForeign('estimate_requests_company_id_foreign');
            $table->dropForeign('estimate_requests_currency_id_foreign');
            $table->dropForeign('estimate_requests_estimate_id_foreign');
            $table->dropForeign('estimate_requests_project_id_foreign');
        });
    }
};
