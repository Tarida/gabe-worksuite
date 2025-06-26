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
        Schema::create('recruit_recommendation_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_recommendation_statuses_company_id_foreign');
            $table->string('status');
            $table->unsignedInteger('added_by')->nullable()->index('recruit_recommendation_statuses_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruit_recommendation_statuses_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_recommendation_statuses');
    }
};
