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
        Schema::create('company_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('company_addresses_company_id_foreign');
            $table->unsignedInteger('country_id')->nullable()->index('company_addresses_country_id_foreign');
            $table->mediumText('address');
            $table->boolean('is_default');
            $table->string('tax_number')->nullable();
            $table->string('tax_name')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_addresses');
    }
};
