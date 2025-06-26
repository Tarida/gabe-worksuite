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
        Schema::create('currency_format_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('currency_format_settings_company_id_foreign');
            $table->enum('currency_position', ['left', 'right', 'left_with_space', 'right_with_space'])->default('left');
            $table->unsignedInteger('no_of_decimal')->default(2);
            $table->string('thousand_separator')->nullable();
            $table->string('decimal_separator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_format_settings');
    }
};
