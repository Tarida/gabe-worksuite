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
        Schema::create('project_departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('project_id')->index('project_departments_project_id_foreign');
            $table->unsignedInteger('team_id')->index('project_departments_team_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_departments');
    }
};
