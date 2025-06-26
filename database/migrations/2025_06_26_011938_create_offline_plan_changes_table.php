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
        Schema::create('offline_plan_changes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->index('offline_plan_changes_company_id_foreign');
            $table->unsignedBigInteger('package_id')->index('offline_plan_changes_package_id_foreign');
            $table->string('package_type');
            $table->double('amount', null, 0)->nullable();
            $table->date('pay_date')->nullable();
            $table->date('next_pay_date')->nullable();
            $table->unsignedBigInteger('invoice_id')->nullable()->index('offline_plan_changes_invoice_id_foreign');
            $table->unsignedInteger('offline_method_id')->index('offline_plan_changes_offline_method_id_foreign');
            $table->string('file_name')->nullable();
            $table->enum('status', ['verified', 'pending', 'rejected'])->default('pending');
            $table->text('remark')->nullable();
            $table->mediumText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_plan_changes');
    }
};
