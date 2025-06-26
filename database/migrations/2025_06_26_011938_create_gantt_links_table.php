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
        Schema::create('gantt_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->unsignedInteger('project_id')->nullable()->index('gantt_links_project_id_foreign');
            $table->unsignedInteger('source')->index('gantt_links_source_foreign');
            $table->unsignedInteger('target')->index('gantt_links_target_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gantt_links');
    }
};
