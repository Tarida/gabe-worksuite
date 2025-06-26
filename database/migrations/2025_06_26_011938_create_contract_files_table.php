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
        Schema::create('contract_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('contract_files_company_id_foreign');
            $table->unsignedInteger('user_id')->index('contract_files_user_id_foreign');
            $table->unsignedBigInteger('contract_id')->index('contract_files_contract_id_foreign');
            $table->string('filename');
            $table->string('hashname');
            $table->string('size');
            $table->string('google_url');
            $table->string('dropbox_link');
            $table->string('external_link_name');
            $table->string('external_link');
            $table->text('description')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('contract_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('contract_files_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_files');
    }
};
