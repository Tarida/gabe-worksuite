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
        Schema::create('discussion_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('discussion_replies_company_id_foreign');
            $table->unsignedInteger('discussion_id')->index('discussion_replies_discussion_id_foreign');
            $table->unsignedInteger('user_id')->index('discussion_replies_user_id_foreign');
            $table->longText('body');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_replies');
    }
};
