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
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable()->index('events_parent_id_foreign');
            $table->unsignedInteger('company_id')->nullable()->index('events_company_id_foreign');
            $table->string('event_name');
            $table->string('label_color');
            $table->string('where');
            $table->mediumText('description');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->unsignedInteger('host')->nullable()->index('events_host_foreign');
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->string('note');
            $table->enum('repeat', ['yes', 'no'])->default('no');
            $table->integer('repeat_every')->nullable();
            $table->integer('repeat_cycles')->nullable();
            $table->enum('repeat_type', ['day', 'week', 'month', 'year'])->default('day');
            $table->enum('send_reminder', ['yes', 'no'])->default('no');
            $table->integer('remind_time')->nullable();
            $table->enum('remind_type', ['day', 'hour', 'minute'])->default('day');
            $table->string('event_link')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('events_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('events_last_updated_by_foreign');
            $table->text('event_id')->nullable();
            $table->timestamps();
            $table->text('departments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
