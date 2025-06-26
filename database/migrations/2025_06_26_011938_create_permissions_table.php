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
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('module_id')->index('permissions_module_id_foreign');
            $table->boolean('is_custom')->default(false);
            $table->text('allowed_permissions')->nullable();
            $table->timestamps();

            $table->unique(['name', 'module_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
