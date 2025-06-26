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
        Schema::create('lead_category', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('lead_category_company_id_foreign');
            $table->string('category_name');
            $table->unsignedInteger('added_by')->nullable()->index('lead_category_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('lead_category_last_updated_by_foreign');
            $table->timestamps();
            $table->boolean('is_default')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_category');
    }
};
