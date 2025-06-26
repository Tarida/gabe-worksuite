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
        Schema::create('lead_user_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('lead_user_notes_user_id_foreign');
            $table->unsignedInteger('lead_note_id')->index('lead_user_notes_lead_note_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_user_notes');
    }
};
