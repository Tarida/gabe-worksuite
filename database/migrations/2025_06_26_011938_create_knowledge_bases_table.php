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
        Schema::create('knowledge_bases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('knowledge_bases_company_id_foreign');
            $table->string('to')->default('employee');
            $table->string('heading')->nullable();
            $table->unsignedInteger('category_id')->nullable()->index('knowledge_bases_category_id_foreign');
            $table->mediumText('description')->nullable();
            $table->unsignedInteger('added_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_bases');
    }
};
