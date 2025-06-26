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
        Schema::create('zoom_meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('zoom_meetings_company_id_foreign');
            $table->string('meeting_id', 50)->nullable();
            $table->unsignedInteger('created_by')->index('zoom_meetings_created_by_foreign');
            $table->string('meeting_name', 100);
            $table->string('label_color', 20);
            $table->mediumText('description')->nullable();
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->boolean('repeat')->default(false);
            $table->integer('repeat_every')->nullable();
            $table->integer('repeat_cycles')->nullable();
            $table->enum('repeat_type', ['day', 'week', 'month', 'year']);
            $table->boolean('send_reminder')->default(false);
            $table->integer('remind_time')->nullable();
            $table->enum('remind_type', ['day', 'hour', 'minute']);
            $table->boolean('host_video')->default(false);
            $table->boolean('participant_video')->default(false);
            $table->string('start_link')->nullable();
            $table->string('join_link')->nullable();
            $table->enum('status', ['waiting', 'live', 'canceled', 'finished'])->default('waiting');
            $table->unsignedInteger('project_id')->nullable()->index('zoom_meetings_project_id_foreign');
            $table->timestamps();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('source_meeting_id')->nullable()->index('zoom_meetings_source_meeting_id_foreign');
            $table->bigInteger('occurrence_id')->nullable();
            $table->integer('occurrence_order')->nullable();
            $table->unsignedBigInteger('category_id')->nullable()->index('zoom_meetings_category_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('zoom_meetings_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('zoom_meetings_last_updated_by_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_meetings');
    }
};
