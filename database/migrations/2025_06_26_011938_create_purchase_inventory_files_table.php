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
        Schema::create('purchase_inventory_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_inventory_files_company_id_foreign');
            $table->unsignedInteger('inventory_id')->nullable()->index('purchase_inventory_files_inventory_id_foreign');
            $table->string('filename');
            $table->string('hashname')->nullable();
            $table->string('size')->nullable();
            $table->text('description')->nullable();
            $table->string('google_url')->nullable();
            $table->string('dropbox_link')->nullable();
            $table->string('external_link_name')->nullable();
            $table->text('external_link')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('project_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('project_files_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_inventory_files');
    }
};
