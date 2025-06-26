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
        Schema::table('proposal_template_item_images', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['proposal_template_item_id'])->references(['id'])->on('proposal_template_items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proposal_template_item_images', function (Blueprint $table) {
            $table->dropForeign('proposal_template_item_images_company_id_foreign');
            $table->dropForeign('proposal_template_item_images_proposal_template_item_id_foreign');
        });
    }
};
