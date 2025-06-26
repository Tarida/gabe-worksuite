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
        Schema::create('support_ticket_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('support_ticket_id')->index('support_ticket_replies_support_ticket_id_foreign');
            $table->unsignedInteger('user_id')->index('support_ticket_replies_user_id_foreign');
            $table->longText('message');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_ticket_replies');
    }
};
