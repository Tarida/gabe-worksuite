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
        Schema::create('contract_signs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('contract_signs_company_id_foreign');
            $table->unsignedBigInteger('contract_id')->index('contract_signs_contract_id_foreign');
            $table->string('full_name');
            $table->string('email');
            $table->string('signature');
            $table->timestamps();
            $table->string('place')->nullable();
            $table->string('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_signs');
    }
};
