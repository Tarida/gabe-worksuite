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
        Schema::create('performance_meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('performance_meetings_company_id_foreign');
            $table->unsignedBigInteger('parent_id')->nullable()->index('performance_meetings_parent_id_foreign');
            $table->unsignedBigInteger('objective_id')->nullable()->index('performance_meetings_objective_id_foreign');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->enum('repeat', ['yes', 'no'])->default('no');
            $table->enum('repeat_every', ['day', 'week', 'month', 'year'])->nullable();
            $table->integer('repeat_cycles')->nullable();
            $table->enum('repeat_type', ['after', 'on'])->nullable();
            $table->date('until_date')->nullable();
            $table->unsignedInteger('meeting_for')->index('performance_meetings_meeting_for_foreign');
            $table->unsignedInteger('meeting_by')->index('performance_meetings_meeting_by_foreign');
            $table->unsignedInteger('added_by')->index('performance_meetings_added_by_foreign');
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_meetings');
    }
};
