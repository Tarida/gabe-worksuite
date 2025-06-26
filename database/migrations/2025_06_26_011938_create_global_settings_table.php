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
        Schema::create('global_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('global_app_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('light_logo')->nullable();
            $table->string('login_background')->nullable();
            $table->string('logo_background_color')->nullable();
            $table->string('header_color')->default('#1D82F5');
            $table->string('sidebar_logo_style')->nullable()->default('square');
            $table->string('locale')->default('en');
            $table->string('hash')->nullable();
            $table->string('purchase_code', 100)->nullable();
            $table->timestamp('supported_until')->nullable();
            $table->timestamp('purchased_on')->nullable();
            $table->timestamp('last_license_verified_at')->nullable();
            $table->enum('google_recaptcha_status', ['active', 'deactive'])->default('deactive');
            $table->enum('google_recaptcha_v2_status', ['active', 'deactive'])->default('deactive');
            $table->string('google_recaptcha_v2_site_key')->nullable();
            $table->string('google_recaptcha_v2_secret_key')->nullable();
            $table->enum('google_recaptcha_v3_status', ['active', 'deactive'])->default('deactive');
            $table->string('google_recaptcha_v3_site_key')->nullable();
            $table->string('google_recaptcha_v3_secret_key')->nullable();
            $table->boolean('app_debug')->default(false);
            $table->string('currency_converter_key')->nullable();
            $table->string('currency_key_version')->default('free');
            $table->string('dedicated_subdomain')->nullable();
            $table->string('moment_format')->default('DD-MM-YYYY');
            $table->string('timezone')->default('Asia/Kolkata');
            $table->boolean('rtl')->default(false);
            $table->string('license_type', 20)->nullable();
            $table->boolean('hide_cron_message')->default(false);
            $table->boolean('system_update')->default(true);
            $table->boolean('show_review_modal')->default(true);
            $table->timestamp('last_cron_run')->nullable();
            $table->string('favicon')->nullable();
            $table->enum('auth_theme', ['dark', 'light'])->default('light');
            $table->enum('auth_theme_text', ['dark', 'light'])->default('dark');
            $table->enum('session_driver', ['file', 'database'])->default('file');
            $table->text('allowed_file_types')->nullable();
            $table->integer('allowed_file_size')->default(10);
            $table->integer('allow_max_no_of_files')->default(10);
            $table->integer('datatable_row_limit')->default(10);
            $table->boolean('show_update_popup')->default(true);
            $table->text('terms_link')->nullable();
            $table->enum('sign_up_terms', ['yes', 'no'])->default('no');
            $table->enum('google_calendar_status', ['active', 'inactive'])->default('inactive');
            $table->text('google_client_id')->nullable();
            $table->text('google_client_secret')->nullable();
            $table->enum('google_calendar_verification_status', ['verified', 'non_verified'])->default('non_verified');
            $table->string('google_id')->nullable();
            $table->string('name')->nullable();
            $table->text('token')->nullable();
            $table->timestamps();
            $table->string('company_email');
            $table->string('company_phone')->nullable();
            $table->text('address')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable()->index('global_settings_currency_id_foreign');
            $table->string('date_format', 20)->default('d-m-Y');
            $table->string('time_format', 20)->default('h:i a');
            $table->text('google_map_key')->nullable();
            $table->string('date_picker_format')->nullable();
            $table->decimal('latitude', 10, 8)->default(26.9124336);
            $table->decimal('longitude', 11, 8)->default(75.7872709);
            $table->enum('active_theme', ['default', 'custom'])->default('default');
            $table->unsignedInteger('last_updated_by')->nullable()->index('global_settings_last_updated_by_foreign');
            $table->boolean('rounded_theme');
            $table->boolean('front_design')->default(true);
            $table->boolean('email_verification')->default(false);
            $table->string('logo_front')->nullable();
            $table->boolean('login_ui');
            $table->longText('auth_css')->nullable();
            $table->longText('auth_css_theme_two')->nullable();
            $table->string('new_company_locale')->nullable();
            $table->boolean('frontend_disable')->default(false);
            $table->string('setup_homepage')->default('default');
            $table->string('custom_homepage_url')->nullable();
            $table->text('expired_message')->nullable();
            $table->boolean('enable_register')->default(true);
            $table->boolean('registration_open')->default(true);
            $table->boolean('company_need_approval')->default(false);
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_settings');
    }
};
