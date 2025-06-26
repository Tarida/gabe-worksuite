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
        Schema::create('weekly_timesheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('weekly_timesheets_company_id_foreign');
            $table->unsignedInteger('user_id')->index('weekly_timesheets_user_id_foreign');
            $table->unsignedInteger('approved_by')->nullable()->index('weekly_timesheets_approved_by_foreign');
            $table->date('week_start_date');
            $table->enum('status', ['pending', 'approved', 'draft'])->default('draft');
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_timesheets');
    }
};
