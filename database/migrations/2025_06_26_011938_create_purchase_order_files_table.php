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
        Schema::create('purchase_order_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_order_id')->index('purchase_files_invoice_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('purchase_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('purchase_files_last_updated_by_foreign');
            $table->string('filename', 200)->nullable();
            $table->string('hashname', 200)->nullable();
            $table->string('size', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_files');
    }
};
