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
        Schema::create('pipeline_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('pipeline_stages_company_id_foreign');
            $table->unsignedBigInteger('lead_pipeline_id')->nullable()->index('pipeline_stages_lead_pipeline_id_foreign');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('priority')->default(0);
            $table->boolean('default')->default(false);
            $table->string('label_color')->default('#ff0000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pipeline_stages');
    }
};
