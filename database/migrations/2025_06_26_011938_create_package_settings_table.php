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
        Schema::create('package_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->integer('no_of_days')->nullable()->default(30);
            $table->string('modules', 1000)->nullable();
            $table->text('trial_message')->nullable();
            $table->integer('notification_before')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_settings');
    }
};
