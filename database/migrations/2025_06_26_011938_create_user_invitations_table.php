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
        Schema::create('user_invitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('user_invitations_company_id_foreign');
            $table->unsignedInteger('user_id')->index('user_invitations_user_id_foreign');
            $table->enum('invitation_type', ['email', 'link'])->default('email');
            $table->string('email')->nullable();
            $table->string('invitation_code');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('email_restriction')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_invitations');
    }
};
