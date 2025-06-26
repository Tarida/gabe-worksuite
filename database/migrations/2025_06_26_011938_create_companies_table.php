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
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('app_name')->nullable();
            $table->string('company_email');
            $table->string('company_phone')->nullable();
            $table->string('logo')->nullable();
            $table->string('light_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->enum('auth_theme', ['dark', 'light'])->default('light');
            $table->enum('auth_theme_text', ['dark', 'light'])->default('dark');
            $table->enum('sidebar_logo_style', ['square', 'full'])->default('square');
            $table->string('login_background')->nullable();
            $table->text('address');
            $table->string('website')->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('companies_currency_id_foreign');
            $table->unsignedBigInteger('package_id')->nullable()->index('companies_package_id_foreign');
            $table->enum('package_type', ['monthly', 'annual'])->default('monthly');
            $table->string('timezone')->default('Asia/Kolkata');
            $table->string('date_format', 20)->default('d-m-Y');
            $table->string('date_picker_format')->default('dd-mm-yyyy');
            $table->string('year_starts_from')->default('1');
            $table->string('moment_format')->default('DD-MM-YYYY');
            $table->string('time_format', 20)->default('h:i a');
            $table->string('locale')->default('en');
            $table->decimal('latitude', 10, 8)->default(26.9124336);
            $table->decimal('longitude', 11, 8)->default(75.7872709);
            $table->enum('leaves_start_from', ['joining_date', 'year_start'])->default('joining_date');
            $table->enum('active_theme', ['default', 'custom'])->default('default');
            $table->enum('status', ['active', 'inactive', 'license_expired'])->nullable()->default('active');
            $table->unsignedInteger('last_updated_by')->nullable()->index('companies_last_updated_by_foreign');
            $table->string('currency_converter_key')->nullable();
            $table->string('google_map_key')->nullable();
            $table->enum('task_self', ['yes', 'no'])->default('yes');
            $table->string('purchase_code', 100)->nullable();
            $table->string('license_type', 20)->nullable();
            $table->timestamp('supported_until')->nullable();
            $table->enum('google_recaptcha_status', ['active', 'deactive'])->default('deactive');
            $table->enum('google_recaptcha_v2_status', ['active', 'deactive'])->default('deactive');
            $table->string('google_recaptcha_v2_site_key')->nullable();
            $table->string('google_recaptcha_v2_secret_key')->nullable();
            $table->enum('google_recaptcha_v3_status', ['active', 'deactive'])->default('deactive');
            $table->string('google_recaptcha_v3_site_key')->nullable();
            $table->string('google_recaptcha_v3_secret_key')->nullable();
            $table->boolean('app_debug')->default(false);
            $table->boolean('rounded_theme')->default(true);
            $table->boolean('hide_cron_message')->default(false);
            $table->boolean('system_update')->default(true);
            $table->string('logo_background_color')->default('#ffffff');
            $table->string('header_color')->default('#1D82F5');
            $table->integer('before_days');
            $table->integer('after_days');
            $table->enum('on_deadline', ['yes', 'no'])->default('yes');
            $table->unsignedInteger('default_task_status')->nullable()->index('companies_default_task_status_foreign');
            $table->boolean('show_review_modal')->default(true);
            $table->boolean('dashboard_clock')->default(true);
            $table->boolean('ticket_form_google_captcha')->default(false);
            $table->boolean('lead_form_google_captcha')->default(false);
            $table->integer('taskboard_length')->default(10);
            $table->integer('datatable_row_limit')->default(10);
            $table->timestamp('last_cron_run')->nullable();
            $table->enum('session_driver', ['file', 'database'])->default('file');
            $table->boolean('allow_client_signup');
            $table->boolean('admin_client_signup_approval');
            $table->text('allowed_file_types')->nullable();
            $table->enum('google_calendar_status', ['active', 'inactive'])->default('inactive');
            $table->text('google_client_id')->nullable();
            $table->text('google_client_secret')->nullable();
            $table->enum('google_calendar_verification_status', ['verified', 'non_verified'])->default('non_verified');
            $table->string('google_id')->nullable();
            $table->string('name')->nullable();
            $table->text('token')->nullable();
            $table->string('hash')->nullable();
            $table->integer('allowed_file_size')->default(10);
            $table->enum('currency_key_version', ['free', 'api'])->default('free');
            $table->timestamps();
            $table->dateTime('last_login')->nullable();
            $table->boolean('rtl')->default(false);
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->date('licence_expire_on')->nullable();
            $table->timestamp('license_updated_at')->nullable();
            $table->timestamp('subscription_updated_at')->nullable();
            $table->boolean('approved')->default(true);
            $table->unsignedInteger('approved_by')->nullable()->index('companies_approved_by_foreign');
            $table->boolean('show_new_webhook_alert')->default(false);
            $table->string('pm_type')->nullable();
            $table->string('pm_last_four')->nullable();
            $table->boolean('employee_can_export_data')->default(true);
            $table->text('headers')->nullable();
            $table->string('register_ip')->nullable();
            $table->text('location_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
