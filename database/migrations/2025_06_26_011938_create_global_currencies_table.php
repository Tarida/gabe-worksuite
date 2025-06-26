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
        Schema::create('global_currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('currency_name');
            $table->string('currency_symbol');
            $table->string('currency_code');
            $table->double('exchange_rate', null, 0)->nullable();
            $table->double('usd_price', null, 0)->nullable();
            $table->enum('is_cryptocurrency', ['yes', 'no'])->default('no');
            $table->enum('currency_position', ['left', 'right', 'left_with_space', 'right_with_space'])->default('left');
            $table->unsignedInteger('no_of_decimal')->default(2);
            $table->string('thousand_separator')->nullable();
            $table->string('decimal_separator')->nullable();
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_currencies');
    }
};
