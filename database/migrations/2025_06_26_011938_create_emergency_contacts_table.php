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
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('emergency_contacts_company_id_foreign');
            $table->unsignedInteger('user_id')->index('emergency_contacts_user_id_foreign');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('relation')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('emergency_contacts_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('emergency_contacts_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_contacts');
    }
};
