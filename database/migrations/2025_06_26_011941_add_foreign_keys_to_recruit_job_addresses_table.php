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
        Schema::table('recruit_job_addresses', function (Blueprint $table) {
            $table->foreign(['company_address_id'])->references(['id'])->on('company_addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_id'])->references(['id'])->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_addresses', function (Blueprint $table) {
            $table->dropForeign('recruit_job_addresses_company_address_id_foreign');
            $table->dropForeign('recruit_job_addresses_recruit_job_id_foreign');
        });
    }
};
