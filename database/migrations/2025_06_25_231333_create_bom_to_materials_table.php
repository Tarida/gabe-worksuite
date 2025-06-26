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
        Schema::create('bom_to_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('bill_of_material_id')->nullable();
            $table->foreign('bill_of_material_id')->references('id')->on('bill_of_materials');

            $table->unsignedBigInteger('production_material_id')->nullable();
            $table->foreign('production_material_id')->references('id')->on('production_materials');
            $table->double('amount', 12, 3)->nullable()->default(0);
            $table->string('amount_unit')->nullable();
            $table->double('price', 12, 2)->nullable()->default(0);
            $table->string('price_currency')->default('IDR');
            $table->double('currency_rate')->default(1);
            $table->unsignedInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users');
            $table->unsignedInteger('last_updated_by')->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bom_to_materials');
    }
};
