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
        Schema::create('pinned', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('pinned_company_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('pinned_project_id_foreign');
            $table->unsignedInteger('task_id')->nullable()->index('pinned_task_id_foreign');
            $table->unsignedInteger('user_id')->index('pinned_user_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinned');
    }
};
