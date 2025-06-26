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
        Schema::create('ticket_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('ticket_id')->index('ticket_activities_ticket_id_foreign');
            $table->unsignedInteger('user_id')->index('ticket_activities_user_id_foreign');
            $table->unsignedInteger('assigned_to')->nullable()->index('ticket_activities_assigned_to_foreign');
            $table->unsignedInteger('channel_id')->nullable()->index('ticket_activities_channel_id_foreign');
            $table->unsignedInteger('group_id')->nullable()->index('ticket_activities_group_id_foreign');
            $table->unsignedInteger('type_id')->nullable()->index('ticket_activities_type_id_foreign');
            $table->string('status')->default('open');
            $table->string('priority')->default('medium');
            $table->string('type')->default('create');
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_activities');
    }
};
