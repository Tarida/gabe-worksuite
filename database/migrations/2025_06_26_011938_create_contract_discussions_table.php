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
        Schema::create('contract_discussions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('contract_discussions_company_id_foreign');
            $table->unsignedBigInteger('contract_id')->index('contract_discussions_contract_id_foreign');
            $table->unsignedInteger('from')->index('contract_discussions_from_foreign');
            $table->longText('message');
            $table->unsignedInteger('added_by')->nullable()->index('contract_discussions_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('contract_discussions_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_discussions');
    }
};
