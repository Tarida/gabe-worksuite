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
        Schema::create('asset_lending_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('asset_lending_history_company_id_foreign');
            $table->unsignedBigInteger('asset_id')->index('asset_lending_history_asset_id_foreign');
            $table->unsignedInteger('user_id')->index('asset_lending_history_user_id_foreign');
            $table->unsignedInteger('lender_id')->index('asset_lending_history_lender_id_foreign');
            $table->unsignedInteger('returner_id')->nullable()->index('asset_lending_history_returner_id_foreign');
            $table->dateTime('date_given');
            $table->dateTime('return_date')->nullable();
            $table->dateTime('date_of_return')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_lending_history');
    }
};
