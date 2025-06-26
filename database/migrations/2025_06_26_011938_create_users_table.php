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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('users_company_id_foreign');
            $table->unsignedBigInteger('user_auth_id')->nullable()->index('users_user_auth_id_foreign');
            $table->boolean('is_superadmin')->default(false);
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->integer('country_phonecode')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->nullable()->default('male');
            $table->enum('salutation', ['mr', 'mrs', 'miss', 'dr', 'sir', 'madam'])->nullable();
            $table->string('locale')->default('en');
            $table->enum('status', ['active', 'deactive'])->default('active');
            $table->enum('login', ['enable', 'disable'])->default('enable');
            $table->text('onesignal_player_id')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->boolean('email_notifications')->default(true);
            $table->unsignedInteger('country_id')->nullable()->index('users_country_id_foreign');
            $table->boolean('dark_theme');
            $table->boolean('rtl');
            $table->boolean('admin_approval')->default(true);
            $table->boolean('permission_sync')->default(true);
            $table->boolean('google_calendar_status')->default(true);
            $table->timestamps();
            $table->boolean('customised_permissions')->default(false);
            $table->string('stripe_id')->nullable()->index();
            $table->string('pm_type')->nullable();
            $table->string('pm_last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->text('headers')->nullable();
            $table->string('register_ip')->nullable();
            $table->text('location_details')->nullable();
            $table->date('inactive_date')->nullable();
            $table->unsignedInteger('is_client_contact')->nullable()->index();
            $table->bigInteger('telegram_user_id')->nullable();

            $table->unique(['email', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
