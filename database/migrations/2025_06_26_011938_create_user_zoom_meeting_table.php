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
        Schema::create('user_zoom_meeting', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->index('user_zoom_meeting_user_id_foreign');
            $table->unsignedBigInteger('zoom_meeting_id')->index('user_zoom_meeting_zoom_meeting_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_zoom_meeting');
    }
};
