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
        Schema::create('recruit_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->longText('about')->nullable();
            $table->string('type')->nullable()->default('bg-image');
            $table->string('background_image')->nullable();
            $table->string('background_color')->nullable();
            $table->longText('mail_setting');
            $table->longText('form_settings')->nullable();
            $table->longText('legal_term')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_website')->nullable();
            $table->enum('career_site', ['yes', 'no'])->default('yes');
            $table->integer('offer_letter_reminder');
            $table->enum('job_alert_status', ['yes', 'no'])->default('no');
            $table->timestamps();
            $table->integer('application_restriction')->default(180);
            $table->enum('google_recaptcha_status', ['active', 'deactive'])->default('deactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_settings');
    }
};
