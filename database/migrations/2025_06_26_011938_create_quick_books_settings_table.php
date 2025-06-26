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
        Schema::create('quick_books_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('quick_books_settings_company_id_foreign');
            $table->string('sandbox_client_id');
            $table->string('sandbox_client_secret');
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('access_token');
            $table->string('refresh_token');
            $table->string('realmid');
            $table->enum('sync_type', ['one_way', 'two_way'])->default('one_way');
            $table->enum('environment', ['Development', 'Production'])->default('Production');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_books_settings');
    }
};
