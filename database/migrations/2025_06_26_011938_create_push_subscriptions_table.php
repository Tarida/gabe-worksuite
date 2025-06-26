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
        Schema::create('push_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('push_subscriptions_company_id_foreign');
            $table->unsignedInteger('user_id')->index();
            $table->string('endpoint');
            $table->string('public_key')->nullable();
            $table->string('auth_token')->nullable();
            $table->timestamps();

            $table->unique(['endpoint', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('push_subscriptions');
    }
};
