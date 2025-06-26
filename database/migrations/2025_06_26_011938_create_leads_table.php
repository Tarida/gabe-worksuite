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
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('leads_company_id_foreign');
            $table->integer('client_id')->nullable();
            $table->integer('source_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('column_priority');
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->text('address')->nullable();
            $table->enum('salutation', ['mr', 'mrs', 'miss', 'dr', 'sir', 'madam'])->nullable();
            $table->string('client_name');
            $table->string('client_email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('cell')->nullable();
            $table->string('office')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('note')->nullable();
            $table->unsignedInteger('category_id')->nullable()->index('leads_category_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('leads_added_by_foreign');
            $table->integer('lead_owner')->nullable();
            $table->unsignedInteger('last_updated_by')->nullable()->index('leads_last_updated_by_foreign');
            $table->text('hash')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
