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
        Schema::create('offline_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('offline_invoices_company_id_foreign');
            $table->unsignedBigInteger('package_id')->index('offline_invoices_package_id_foreign');
            $table->string('package_type')->nullable();
            $table->unsignedInteger('offline_method_id')->nullable()->index('offline_invoices_offline_method_id_foreign');
            $table->string('transaction_id')->nullable();
            $table->decimal('amount', 12)->unsigned();
            $table->date('pay_date');
            $table->date('next_pay_date')->nullable();
            $table->enum('status', ['paid', 'unpaid', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_invoices');
    }
};
