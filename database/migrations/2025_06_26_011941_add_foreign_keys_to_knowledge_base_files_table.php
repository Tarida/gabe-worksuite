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
        Schema::table('knowledge_base_files', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['knowledge_base_id'])->references(['id'])->on('knowledge_bases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('knowledge_base_files', function (Blueprint $table) {
            $table->dropForeign('knowledge_base_files_added_by_foreign');
            $table->dropForeign('knowledge_base_files_company_id_foreign');
            $table->dropForeign('knowledge_base_files_knowledge_base_id_foreign');
            $table->dropForeign('knowledge_base_files_last_updated_by_foreign');
        });
    }
};
