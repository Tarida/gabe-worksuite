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
        Schema::create('database_backup_cron_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->time('hour_of_day')->nullable();
            $table->string('backup_after_days')->nullable();
            $table->string('delete_backup_after_days')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_backup_cron_settings');
    }
};
