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
        Schema::table('user_permissions', function (Blueprint $table) {
            $table->foreign(['permission_id'])->references(['id'])->on('permissions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['permission_type_id'])->references(['id'])->on('permission_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_permissions', function (Blueprint $table) {
            $table->dropForeign('user_permissions_permission_id_foreign');
            $table->dropForeign('user_permissions_permission_type_id_foreign');
            $table->dropForeign('user_permissions_user_id_foreign');
        });
    }
};
