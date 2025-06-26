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
        Schema::create('recruit_jobboard_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index('recruit_jobboard_settings_user_id_foreign');
            $table->unsignedInteger('recruit_application_status_id')->index('recruit_jobboard_settings_recruit_application_status_id_foreign');
            $table->boolean('collapsed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_jobboard_settings');
    }
};
