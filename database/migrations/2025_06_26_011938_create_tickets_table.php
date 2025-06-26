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
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('ticket_number')->nullable();
            $table->unsignedInteger('company_id')->nullable()->index('tickets_company_id_foreign');
            $table->unsignedInteger('user_id')->index('tickets_user_id_foreign');
            $table->text('subject');
            $table->enum('status', ['open', 'pending', 'resolved', 'closed'])->default('open');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->unsignedInteger('agent_id')->nullable()->index('tickets_agent_id_foreign');
            $table->unsignedInteger('channel_id')->nullable()->index('tickets_channel_id_foreign');
            $table->unsignedInteger('type_id')->nullable()->index('tickets_type_id_foreign');
            $table->unsignedInteger('group_id')->nullable()->index('tickets_group_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('tickets_project_id_foreign');
            $table->date('close_date')->nullable();
            $table->string('mobile')->nullable();
            $table->unsignedInteger('country_id')->nullable()->index('tickets_country_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('tickets_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('tickets_last_updated_by_foreign');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable()->index();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
