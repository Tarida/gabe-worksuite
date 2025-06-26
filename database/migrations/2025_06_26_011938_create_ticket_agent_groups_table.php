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
        Schema::create('ticket_agent_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('ticket_agent_groups_company_id_foreign');
            $table->unsignedInteger('agent_id')->index('ticket_agent_groups_agent_id_foreign');
            $table->unsignedInteger('group_id')->nullable()->index('ticket_agent_groups_group_id_foreign');
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->unsignedInteger('added_by')->nullable()->index('ticket_agent_groups_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('ticket_agent_groups_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_agent_groups');
    }
};
