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
        Schema::create('designations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('designations_company_id_foreign');
            $table->string('name');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('designations_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('designations_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
