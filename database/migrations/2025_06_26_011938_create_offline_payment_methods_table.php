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
        Schema::create('offline_payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('offline_payment_methods_company_id_foreign');
            $table->string('name');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ['yes', 'no'])->nullable()->default('yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_payment_methods');
    }
};
