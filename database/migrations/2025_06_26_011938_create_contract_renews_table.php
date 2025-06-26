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
        Schema::create('contract_renews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('contract_renews_company_id_foreign');
            $table->unsignedInteger('renewed_by')->index('contract_renews_renewed_by_foreign');
            $table->unsignedBigInteger('contract_id')->index('contract_renews_contract_id_foreign');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('amount', 12);
            $table->unsignedInteger('added_by')->nullable()->index('contract_renews_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('contract_renews_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_renews');
    }
};
