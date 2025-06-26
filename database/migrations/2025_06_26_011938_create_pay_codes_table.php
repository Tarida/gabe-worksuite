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
        Schema::create('pay_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('pay_codes_company_id_foreign');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->double('time', null, 0)->nullable();
            $table->boolean('fixed')->default(false);
            $table->double('fixed_amount', null, 0)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_codes');
    }
};
