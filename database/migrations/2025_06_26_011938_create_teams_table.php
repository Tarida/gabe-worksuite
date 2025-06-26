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
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('teams_company_id_foreign');
            $table->string('team_name');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('teams_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('teams_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
