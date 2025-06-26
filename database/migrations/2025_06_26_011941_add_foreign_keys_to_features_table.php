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
        Schema::table('features', function (Blueprint $table) {
            $table->foreign(['front_feature_id'])->references(['id'])->on('front_features')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['language_setting_id'])->references(['id'])->on('language_settings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('features', function (Blueprint $table) {
            $table->dropForeign('features_front_feature_id_foreign');
            $table->dropForeign('features_language_setting_id_foreign');
        });
    }
};
