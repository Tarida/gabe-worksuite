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
        Schema::create('accept_estimates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('accept_estimates_company_id_foreign');
            $table->unsignedInteger('estimate_id')->index('accept_estimates_estimate_id_foreign');
            $table->string('full_name');
            $table->string('email');
            $table->string('signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accept_estimates');
    }
};
