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
        Schema::create('recruiters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruiters_company_id_foreign');
            $table->unsignedInteger('user_id')->index('recruiters_user_id_foreign');
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->unsignedInteger('added_by')->index('recruiters_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruiters_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiters');
    }
};
