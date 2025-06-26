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
        Schema::create('lead_sources', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('lead_sources_company_id_foreign');
            $table->string('type');
            $table->unsignedInteger('added_by')->nullable()->index('lead_sources_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('lead_sources_last_updated_by_foreign');
            $table->timestamps();

            $table->unique(['type', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_sources');
    }
};
