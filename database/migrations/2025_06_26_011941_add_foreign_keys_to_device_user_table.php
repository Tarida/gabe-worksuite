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
        Schema::table('device_user', function (Blueprint $table) {
            $table->foreign(['device_id'])->references(['id'])->on('track_devices')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('device_user', function (Blueprint $table) {
            $table->dropForeign('device_user_device_id_foreign');
        });
    }
};
