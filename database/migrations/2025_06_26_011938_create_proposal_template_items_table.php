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
        Schema::create('proposal_template_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('proposal_template_items_company_id_foreign');
            $table->unsignedBigInteger('proposal_template_id')->index('proposal_template_items_proposal_template_id_foreign');
            $table->string('hsn_sac_code')->nullable();
            $table->string('item_name');
            $table->enum('type', ['item', 'discount', 'tax'])->default('item');
            $table->double('quantity', null, 0);
            $table->double('unit_price', null, 0);
            $table->double('amount', null, 0);
            $table->text('item_summary')->nullable();
            $table->string('taxes')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('unit_id')->nullable()->index('proposal_template_items_unit_id_foreign');
            $table->unsignedInteger('product_id')->nullable()->index('proposal_template_items_product_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_template_items');
    }
};
