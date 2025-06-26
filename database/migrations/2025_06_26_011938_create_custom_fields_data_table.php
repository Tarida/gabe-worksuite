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
        Schema::create('custom_fields_data', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('custom_field_id')->index('custom_fields_data_custom_field_id_foreign');
            $table->unsignedInteger('model_id');
            $table->string('model')->nullable()->index();
            $table->string('value', 10000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_fields_data');
    }
};
