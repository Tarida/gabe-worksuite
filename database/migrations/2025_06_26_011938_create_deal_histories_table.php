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
        Schema::create('deal_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deal_id')->index('deal_histories_deal_id_foreign');
            $table->string('event_type');
            $table->unsignedInteger('created_by')->nullable()->index('deal_histories_created_by_foreign');
            $table->unsignedBigInteger('deal_stage_from_id')->nullable();
            $table->unsignedBigInteger('file_id')->nullable();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->unsignedBigInteger('follow_up_id')->nullable();
            $table->unsignedBigInteger('note_id')->nullable();
            $table->unsignedBigInteger('proposal_id')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->timestamps();
            $table->unsignedInteger('deal_stage_to_id')->nullable()->index('deal_histories_deal_stage_to_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deal_histories');
    }
};
