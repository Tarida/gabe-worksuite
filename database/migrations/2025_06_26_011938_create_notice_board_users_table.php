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
        Schema::create('notice_board_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('notice_id')->index('notice_views_notice_id_foreign');
            $table->enum('type', ['employee', 'client'])->default('employee');
            $table->unsignedInteger('user_id')->index('notice_views_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notice_board_users');
    }
};
