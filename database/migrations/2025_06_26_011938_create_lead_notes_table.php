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
        Schema::create('lead_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_id')->nullable()->index('lead_notes_lead_id_foreign');
            $table->string('title');
            $table->boolean('type')->default(false);
            $table->unsignedInteger('member_id')->nullable()->index('lead_notes_member_id_foreign');
            $table->boolean('is_lead_show')->default(false);
            $table->boolean('ask_password')->default(false);
            $table->text('details')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('lead_notes_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('lead_notes_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_notes');
    }
};
