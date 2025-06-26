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
        Schema::create('client_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('client_contacts_company_id_foreign');
            $table->unsignedInteger('user_id')->index('client_contacts_user_id_foreign');
            $table->string('contact_name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('client_contacts_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('client_contacts_last_updated_by_foreign');
            $table->timestamps();
            $table->unsignedInteger('client_id')->nullable()->index();
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_contacts');
    }
};
