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
        Schema::create('product_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('product_files_company_id_foreign');
            $table->unsignedInteger('product_id')->index('product_files_product_id_foreign');
            $table->string('filename', 200)->nullable();
            $table->string('hashname', 200)->nullable();
            $table->string('size', 200)->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('product_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('product_files_last_updated_by_foreign');
            $table->timestamps();
            $table->boolean('default_status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_files');
    }
};
