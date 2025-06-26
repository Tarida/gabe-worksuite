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
        Schema::table('purpose_consent_users', function (Blueprint $table) {
            $table->foreign(['client_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purpose_consent_id'])->references(['id'])->on('purpose_consent')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['updated_by_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purpose_consent_users', function (Blueprint $table) {
            $table->dropForeign('purpose_consent_users_client_id_foreign');
            $table->dropForeign('purpose_consent_users_purpose_consent_id_foreign');
            $table->dropForeign('purpose_consent_users_updated_by_id_foreign');
        });
    }
};
