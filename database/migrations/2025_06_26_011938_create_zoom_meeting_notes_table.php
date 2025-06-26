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
        Schema::create('zoom_meeting_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('zoom_meeting_notes_company_id_foreign');
            $table->unsignedBigInteger('zoom_meeting_id')->index('zoom_meeting_notes_zoom_meeting_id_foreign');
            $table->unsignedInteger('user_id')->index('zoom_meeting_notes_user_id_foreign');
            $table->text('note');
            $table->unsignedInteger('added_by')->nullable()->index('zoom_meeting_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('zoom_meeting_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_meeting_notes');
    }
};
