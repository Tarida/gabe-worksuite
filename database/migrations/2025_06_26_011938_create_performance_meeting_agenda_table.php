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
        Schema::create('performance_meeting_agenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('meeting_id')->index('performance_meeting_agenda_meeting_id_foreign');
            $table->text('discussion_point');
            $table->unsignedInteger('added_by')->index('performance_meeting_agenda_added_by_foreign');
            $table->enum('is_discussed', ['yes', 'no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_meeting_agenda');
    }
};
