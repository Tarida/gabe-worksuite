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
        Schema::table('expenses_recurring', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['bank_account_id'])->references(['id'])->on('bank_accounts')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['category_id'])->references(['id'])->on('expenses_category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['created_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses_recurring', function (Blueprint $table) {
            $table->dropForeign('expenses_recurring_added_by_foreign');
            $table->dropForeign('expenses_recurring_bank_account_id_foreign');
            $table->dropForeign('expenses_recurring_category_id_foreign');
            $table->dropForeign('expenses_recurring_company_id_foreign');
            $table->dropForeign('expenses_recurring_created_by_foreign');
            $table->dropForeign('expenses_recurring_currency_id_foreign');
            $table->dropForeign('expenses_recurring_last_updated_by_foreign');
            $table->dropForeign('expenses_recurring_project_id_foreign');
            $table->dropForeign('expenses_recurring_user_id_foreign');
        });
    }
};
