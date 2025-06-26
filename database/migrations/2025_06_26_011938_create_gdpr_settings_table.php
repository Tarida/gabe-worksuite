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
        Schema::create('gdpr_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enable_gdpr')->default(false);
            $table->boolean('show_customer_area')->default(false);
            $table->boolean('show_customer_footer')->default(false);
            $table->longText('top_information_block')->nullable();
            $table->boolean('enable_export')->default(false);
            $table->boolean('data_removal')->default(false);
            $table->boolean('lead_removal_public_form')->default(false);
            $table->boolean('terms_customer_footer')->default(false);
            $table->longText('terms')->nullable();
            $table->longText('policy')->nullable();
            $table->boolean('public_lead_edit')->default(false);
            $table->boolean('consent_customer')->default(false);
            $table->boolean('consent_leads')->default(false);
            $table->longText('consent_block')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gdpr_settings');
    }
};
