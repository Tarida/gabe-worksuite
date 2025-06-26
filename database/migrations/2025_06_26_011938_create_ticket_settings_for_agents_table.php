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
        Schema::create('ticket_settings_for_agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable()->index('ticket_setting_user_id_foreign');
            $table->unsignedInteger('company_id')->nullable()->index('ticket_settings_for_agents_company_id_foreign');
            $table->string('ticket_scope')->nullable();
            $table->text('group_id')->nullable();
            $table->unsignedInteger('updated_by')->nullable()->index('ticket_settings_for_agents_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_settings_for_agents');
    }
};
