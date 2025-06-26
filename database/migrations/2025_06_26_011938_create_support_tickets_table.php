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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('support_tickets_company_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('support_tickets_user_id_foreign');
            $table->unsignedInteger('created_by')->index('support_tickets_created_by_foreign');
            $table->text('subject');
            $table->longText('description');
            $table->enum('status', ['open', 'pending', 'resolved', 'closed'])->default('open');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->unsignedInteger('agent_id')->nullable()->index('support_tickets_agent_id_foreign');
            $table->unsignedBigInteger('support_ticket_type_id')->nullable()->index('support_tickets_support_ticket_type_id_foreign');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
