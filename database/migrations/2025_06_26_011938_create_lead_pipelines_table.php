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
        Schema::create('lead_pipelines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('lead_pipelines_company_id_foreign');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('priority')->default(0);
            $table->string('label_color')->default('#ff0000');
            $table->boolean('default');
            $table->timestamps();
            $table->integer('added_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_pipelines');
    }
};
