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
        Schema::create('ticket_custom_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('ticket_custom_forms_company_id_foreign');
            $table->unsignedInteger('custom_fields_id')->nullable()->index('ticket_custom_forms_custom_fields_id_foreign');
            $table->string('field_display_name');
            $table->string('field_name');
            $table->string('field_type')->default('text');
            $table->integer('field_order');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('required')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_custom_forms');
    }
};
