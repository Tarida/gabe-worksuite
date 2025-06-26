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
        Schema::table('recruit_jobboard_settings', function (Blueprint $table) {
            $table->foreign(['recruit_application_status_id'])->references(['id'])->on('recruit_application_status')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_jobboard_settings', function (Blueprint $table) {
            $table->dropForeign('recruit_jobboard_settings_recruit_application_status_id_foreign');
            $table->dropForeign('recruit_jobboard_settings_user_id_foreign');
        });
    }
};
