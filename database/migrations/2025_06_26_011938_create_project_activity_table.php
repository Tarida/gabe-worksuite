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
        Schema::create('project_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->index('project_activity_project_id_foreign');
            $table->text('activity');
            $table->timestamp('created_at')->nullable()->index();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_activity');
    }
};
