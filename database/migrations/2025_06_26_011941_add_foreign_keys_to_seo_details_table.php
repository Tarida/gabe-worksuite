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
        Schema::table('seo_details', function (Blueprint $table) {
            $table->foreign(['language_setting_id'])->references(['id'])->on('language_settings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_details', function (Blueprint $table) {
            $table->dropForeign('seo_details_language_setting_id_foreign');
        });
    }
};
