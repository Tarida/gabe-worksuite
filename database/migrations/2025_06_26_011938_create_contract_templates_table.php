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
        Schema::create('contract_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contract_template_number')->nullable();
            $table->unsignedInteger('company_id')->nullable()->index('contract_templates_company_id_foreign');
            $table->string('subject');
            $table->longText('description')->nullable();
            $table->string('amount');
            $table->unsignedBigInteger('contract_type_id')->index('contract_templates_contract_type_id_foreign');
            $table->unsignedInteger('currency_id')->nullable()->index('contract_templates_currency_id_foreign');
            $table->longText('contract_detail')->nullable();
            $table->integer('added_by')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_templates');
    }
};
