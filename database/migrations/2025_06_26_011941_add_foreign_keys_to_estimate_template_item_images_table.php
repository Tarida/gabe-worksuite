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
        Schema::table('estimate_template_item_images', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['estimate_template_item_id'])->references(['id'])->on('estimate_template_items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estimate_template_item_images', function (Blueprint $table) {
            $table->dropForeign('estimate_template_item_images_company_id_foreign');
            $table->dropForeign('estimate_template_item_images_estimate_template_item_id_foreign');
        });
    }
};
