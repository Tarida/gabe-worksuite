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
        Schema::create('project_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable()->index('project_notes_project_id_foreign');
            $table->string('title');
            $table->boolean('type')->default(false);
            $table->unsignedInteger('client_id')->nullable()->index('project_notes_client_id_foreign');
            $table->boolean('is_client_show')->default(false);
            $table->boolean('ask_password')->default(false);
            $table->longText('details');
            $table->unsignedInteger('added_by')->nullable()->index('project_notes_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('project_notes_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_notes');
    }
};
