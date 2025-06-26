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
        Schema::create('knowledge_base_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('knowledge_base_files_company_id_foreign');
            $table->unsignedInteger('knowledge_base_id')->index('knowledge_base_files_knowledge_base_id_foreign');
            $table->string('filename', 200)->nullable();
            $table->string('hashname', 200)->nullable();
            $table->string('size', 200)->nullable();
            $table->string('external_link_name')->nullable();
            $table->text('external_link')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('knowledge_base_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('knowledge_base_files_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_base_files');
    }
};
