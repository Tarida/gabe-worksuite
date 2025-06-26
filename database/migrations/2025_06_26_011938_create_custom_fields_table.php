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
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('custom_fields_company_id_foreign');
            $table->unsignedInteger('custom_field_group_id')->nullable()->index('custom_fields_custom_field_group_id_foreign');
            $table->string('label', 100);
            $table->string('name', 100);
            $table->string('type', 10);
            $table->enum('required', ['yes', 'no'])->default('no');
            $table->string('values', 5000)->nullable();
            $table->boolean('export')->nullable()->default(false);
            $table->enum('visible', ['true', 'false'])->nullable()->default('false');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_fields');
    }
};
