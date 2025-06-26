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
        Schema::table('estimate_template_items', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['estimate_template_id'])->references(['id'])->on('estimate_templates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_id'])->references(['id'])->on('products')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estimate_template_items', function (Blueprint $table) {
            $table->dropForeign('estimate_template_items_company_id_foreign');
            $table->dropForeign('estimate_template_items_estimate_template_id_foreign');
            $table->dropForeign('estimate_template_items_product_id_foreign');
            $table->dropForeign('estimate_template_items_unit_id_foreign');
        });
    }
};
