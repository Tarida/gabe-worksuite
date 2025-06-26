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
        Schema::create('passport_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('passport_details_company_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('passport_details_user_id_foreign');
            $table->unsignedInteger('country_id')->nullable()->index('passport_details_country_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('passport_details_added_by_foreign');
            $table->string('passport_number');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passport_details');
    }
};
