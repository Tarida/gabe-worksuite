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
        Schema::create('lead_custom_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('lead_custom_forms_company_id_foreign');
            $table->unsignedInteger('custom_fields_id')->nullable()->index('lead_custom_forms_custom_fields_id_foreign');
            $table->string('field_display_name');
            $table->string('field_name');
            $table->integer('field_order');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('required')->default(false);
            $table->unsignedInteger('added_by')->nullable()->index('lead_custom_forms_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('lead_custom_forms_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_custom_forms');
    }
};
