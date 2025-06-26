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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('products_company_id_foreign');
            $table->string('name');
            $table->string('price');
            $table->string('purchase_price')->nullable();
            $table->enum('purchase_information', ['1', '0'])->default('0');
            $table->enum('track_inventory', ['1', '0'])->default('0');
            $table->longText('sales_description')->nullable();
            $table->longText('purchase_description')->nullable();
            $table->integer('opening_stock')->nullable();
            $table->double('rate_per_unit', null, 0)->nullable();
            $table->string('taxes')->nullable();
            $table->boolean('allow_purchase')->default(false);
            $table->boolean('downloadable')->default(false);
            $table->string('downloadable_file')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id')->nullable()->index('products_category_id_foreign');
            $table->unsignedBigInteger('sub_category_id')->nullable()->index('products_sub_category_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('products_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('products_last_updated_by_foreign');
            $table->string('hsn_sac_code')->nullable();
            $table->string('default_image')->nullable();
            $table->enum('type', ['goods', 'service'])->nullable()->default('goods');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->unsignedBigInteger('unit_id')->nullable()->index('products_unit_id_foreign');
            $table->string('sku')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
