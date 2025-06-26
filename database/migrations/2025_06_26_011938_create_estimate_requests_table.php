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
        Schema::create('estimate_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('original_request_number')->nullable();
            $table->string('estimate_request_number')->nullable();
            $table->unsignedInteger('client_id')->index('estimate_requests_client_id_foreign');
            $table->unsignedInteger('company_id')->nullable()->index('estimate_requests_company_id_foreign');
            $table->unsignedInteger('estimate_id')->nullable()->index('estimate_requests_estimate_id_foreign');
            $table->longText('description');
            $table->double('estimated_budget', 16, 2);
            $table->unsignedInteger('project_id')->nullable()->index('estimate_requests_project_id_foreign');
            $table->text('early_requirement')->nullable();
            $table->unsignedInteger('currency_id')->nullable()->index('estimate_requests_currency_id_foreign');
            $table->enum('status', ['pending', 'rejected', 'accepted', 'in process'])->default('pending');
            $table->text('reason');
            $table->timestamps();
            $table->unsignedInteger('added_by')->nullable()->index('estimate_requests_added_by_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimate_requests');
    }
};
