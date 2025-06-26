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
        Schema::create('project_template_task_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('project_template_task_id')->index('project_template_task_users_project_template_task_id_foreign');
            $table->unsignedInteger('user_id')->index('project_template_task_users_user_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_template_task_users');
    }
};
