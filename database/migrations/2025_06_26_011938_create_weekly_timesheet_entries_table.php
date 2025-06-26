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
        Schema::create('weekly_timesheet_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('weekly_timesheet_entries_company_id_foreign');
            $table->unsignedBigInteger('weekly_timesheet_id')->index('weekly_timesheet_entries_weekly_timesheet_id_foreign');
            $table->unsignedInteger('task_id')->nullable()->index('weekly_timesheet_entries_task_id_foreign');
            $table->date('date');
            $table->decimal('hours', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_timesheet_entries');
    }
};
