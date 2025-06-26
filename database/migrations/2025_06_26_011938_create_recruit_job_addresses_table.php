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
        Schema::create('recruit_job_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('recruit_job_id')->index('recruit_job_addresses_recruit_job_id_foreign');
            $table->unsignedBigInteger('company_address_id')->index('recruit_job_addresses_company_address_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_job_addresses');
    }
};
