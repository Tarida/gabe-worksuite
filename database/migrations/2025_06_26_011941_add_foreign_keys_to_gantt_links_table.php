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
        Schema::table('gantt_links', function (Blueprint $table) {
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['source'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['target'])->references(['id'])->on('tasks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gantt_links', function (Blueprint $table) {
            $table->dropForeign('gantt_links_project_id_foreign');
            $table->dropForeign('gantt_links_source_foreign');
            $table->dropForeign('gantt_links_target_foreign');
        });
    }
};
