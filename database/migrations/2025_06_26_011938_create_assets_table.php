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
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('assets_company_id_foreign');
            $table->string('name', 100);
            $table->unsignedBigInteger('asset_type_id')->nullable()->index('assets_asset_type_id_foreign');
            $table->string('serial_number', 255)->nullable()->index();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['lent', 'available', 'non-functional', 'lost', 'damaged', 'under-maintenance'])->default('available');
            $table->timestamps();
            $table->string('value')->nullable();
            $table->string('location')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('assets_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('assets_last_updated_by_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
