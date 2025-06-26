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
        Schema::create('tr_front_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('language_setting_id')->nullable()->index('tr_front_details_language_setting_id_foreign');
            $table->string('header_title', 200);
            $table->text('header_description');
            $table->string('image', 200);
            $table->string('feature_title')->nullable();
            $table->text('feature_description')->nullable();
            $table->string('price_title')->nullable();
            $table->text('price_description')->nullable();
            $table->string('task_management_title')->nullable();
            $table->text('task_management_detail')->nullable();
            $table->string('manage_bills_title')->nullable();
            $table->text('manage_bills_detail')->nullable();
            $table->string('teamates_title')->nullable();
            $table->text('teamates_detail')->nullable();
            $table->string('favourite_apps_title')->nullable();
            $table->text('favourite_apps_detail')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_detail')->nullable();
            $table->string('client_title')->nullable();
            $table->text('client_detail')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->text('testimonial_detail')->nullable();
            $table->string('faq_title')->nullable();
            $table->text('faq_detail')->nullable();
            $table->text('footer_copyright_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_front_details');
    }
};
