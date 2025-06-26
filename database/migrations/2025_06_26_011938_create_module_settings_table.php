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
        Schema::create('module_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('module_settings_company_id_foreign');
            $table->string('module_name');
            $table->enum('status', ['active', 'deactive']);
            $table->enum('type', ['admin', 'employee', 'client'])->default('admin');
            $table->timestamps();
            $table->boolean('is_allowed')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_settings');
    }
};
