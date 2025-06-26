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
        Schema::create('user_taskboard_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('user_taskboard_settings_company_id_foreign');
            $table->unsignedInteger('user_id')->index('user_taskboard_settings_user_id_foreign');
            $table->unsignedInteger('board_column_id')->index('user_taskboard_settings_board_column_id_foreign');
            $table->boolean('collapsed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_taskboard_settings');
    }
};
