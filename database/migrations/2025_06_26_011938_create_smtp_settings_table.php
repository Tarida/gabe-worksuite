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
        Schema::create('smtp_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail_driver')->default('smtp');
            $table->string('mail_host')->default('smtp.gmail.com');
            $table->string('mail_port')->default('587');
            $table->string('mail_username')->default('youremail@gmail.com');
            $table->text('mail_password')->nullable()->default('your password');
            $table->string('mail_from_name')->default('your name');
            $table->string('mail_from_email')->default('from@email.com');
            $table->enum('mail_encryption', ['ssl', 'tls', 'starttls'])->nullable()->default('tls');
            $table->boolean('email_verified')->default(false);
            $table->boolean('verified')->default(false);
            $table->enum('mail_connection', ['sync', 'database'])->default('sync');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smtp_settings');
    }
};
