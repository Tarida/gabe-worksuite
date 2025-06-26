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
        Schema::create('product_dimensions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->double('width', 12, 2)->nullable()->default(0);
            $table->double('depth', 12, 2)->nullable()->default(0);
            $table->double('height', 12, 2)->nullable()->default(0);
            $table->double('volume', 12, 2)->nullable()->default(0);
            $table->double('weight', 12, 2)->nullable()->default(0);
            $table->text('parts_size')->nullable();
            $table->unsignedInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users');
            $table->unsignedInteger('last_updated_by')->nullable()->index('product_files_last_updated_by_foreign');
            $table->foreign('last_updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_dimensions');
    }
};
