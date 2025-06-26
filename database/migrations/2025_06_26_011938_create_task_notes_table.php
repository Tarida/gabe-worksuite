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
        Schema::create('task_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('task_id')->index('task_notes_task_id_foreign');
            $table->integer('user_id')->nullable();
            $table->longText('note')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('task_notes_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('task_notes_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_notes');
    }
};
