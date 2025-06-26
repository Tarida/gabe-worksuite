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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['country_id'])->references(['id'])->on('countries')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['is_client_contact'])->references(['id'])->on('client_contacts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_auth_id'])->references(['id'])->on('user_auths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_company_id_foreign');
            $table->dropForeign('users_country_id_foreign');
            $table->dropForeign('users_is_client_contact_foreign');
            $table->dropForeign('users_user_auth_id_foreign');
        });
    }
};
