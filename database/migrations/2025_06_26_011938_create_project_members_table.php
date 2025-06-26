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
        Schema::create('project_members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('project_members_user_id_foreign');
            $table->unsignedInteger('project_id')->index('project_members_project_id_foreign');
            $table->double('hourly_rate', null, 0);
            $table->unsignedInteger('added_by')->nullable()->index('project_members_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('project_members_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_members');
    }
};
