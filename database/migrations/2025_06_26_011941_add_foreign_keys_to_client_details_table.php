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
        Schema::table('client_details', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['category_id'])->references(['id'])->on('client_categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['country_id'])->references(['id'])->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['sub_category_id'])->references(['id'])->on('client_sub_categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_details', function (Blueprint $table) {
            $table->dropForeign('client_details_added_by_foreign');
            $table->dropForeign('client_details_category_id_foreign');
            $table->dropForeign('client_details_company_id_foreign');
            $table->dropForeign('client_details_country_id_foreign');
            $table->dropForeign('client_details_last_updated_by_foreign');
            $table->dropForeign('client_details_sub_category_id_foreign');
            $table->dropForeign('client_details_user_id_foreign');
        });
    }
};
