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
        Schema::create('project_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('project_id')->index('project_ratings_project_id_foreign');
            $table->double('rating', null, 0)->default(0);
            $table->text('comment')->nullable();
            $table->unsignedInteger('user_id')->index('project_ratings_user_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('project_ratings_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('project_ratings_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_ratings');
    }
};
