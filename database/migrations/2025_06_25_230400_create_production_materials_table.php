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
        Schema::create('production_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('purchase_vendors');
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users');
            $table->unsignedInteger('last_updated_by')->nullable()->index('product_files_last_updated_by_foreign');
            $table->foreign('last_updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_materials');
    }
};
