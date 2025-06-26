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
        Schema::create('lead_follow_up', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('deal_id')->nullable()->index('lead_follow_up_deal_id_foreign');
            $table->longText('remark')->nullable();
            $table->dateTime('next_follow_up_date')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('lead_follow_up_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('lead_follow_up_last_updated_by_foreign');
            $table->text('event_id')->nullable();
            $table->enum('send_reminder', ['yes', 'no'])->nullable()->default('no');
            $table->text('remind_time')->nullable();
            $table->enum('remind_type', ['minute', 'hour', 'day'])->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_follow_up');
    }
};
