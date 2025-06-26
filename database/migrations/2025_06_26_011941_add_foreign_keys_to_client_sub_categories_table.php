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
        Schema::table('client_sub_categories', function (Blueprint $table) {
            $table->foreign(['category_id'])->references(['id'])->on('client_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_sub_categories', function (Blueprint $table) {
            $table->dropForeign('client_sub_categories_category_id_foreign');
            $table->dropForeign('client_sub_categories_company_id_foreign');
        });
    }
};
