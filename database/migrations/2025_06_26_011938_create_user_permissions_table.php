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
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index('user_permissions_user_id_foreign');
            $table->unsignedInteger('permission_id')->index('user_permissions_permission_id_foreign');
            $table->unsignedBigInteger('permission_type_id')->index('user_permissions_permission_type_id_foreign');
            $table->timestamps();

            $table->unique(['permission_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_permissions');
    }
};
