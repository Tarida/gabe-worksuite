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
        Schema::create('performance_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('performance_settings_company_id_foreign');
            $table->enum('send_notification', ['yes', 'no'])->default('no');
            $table->text('create_meeting_roles')->nullable();
            $table->boolean('create_meeting_manager')->default(false);
            $table->boolean('create_meeting_participant')->default(false);
            $table->text('view_meeting_roles')->nullable();
            $table->boolean('view_meeting_manager')->default(false);
            $table->boolean('view_meeting_participant')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_settings');
    }
};
