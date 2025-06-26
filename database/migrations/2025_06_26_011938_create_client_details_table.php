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
        Schema::create('client_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('client_details_company_id_foreign');
            $table->unsignedInteger('user_id')->index('client_details_user_id_foreign');
            $table->string('company_name')->nullable();
            $table->text('address')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('office')->nullable();
            $table->string('website')->nullable();
            $table->text('note')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('skype')->nullable();
            $table->string('tax_name')->nullable();
            $table->string('gst_number')->nullable();
            $table->unsignedBigInteger('category_id')->nullable()->index('client_details_category_id_foreign');
            $table->unsignedBigInteger('sub_category_id')->nullable()->index('client_details_sub_category_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('client_details_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('client_details_last_updated_by_foreign');
            $table->string('company_logo')->nullable();
            $table->timestamps();
            $table->string('mobile')->nullable();
            $table->string('office_phone')->nullable();
            $table->unsignedInteger('country_id')->nullable()->index('client_details_country_id_foreign');
            $table->integer('quickbooks_client_id')->nullable();
            $table->string('electronic_address')->nullable();
            $table->string('electronic_address_scheme')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_details');
    }
};
