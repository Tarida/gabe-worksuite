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
        Schema::table('letters', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['creator_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['template_id'])->references(['id'])->on('letter_templates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('letters', function (Blueprint $table) {
            $table->dropForeign('letters_company_id_foreign');
            $table->dropForeign('letters_creator_id_foreign');
            $table->dropForeign('letters_template_id_foreign');
            $table->dropForeign('letters_user_id_foreign');
        });
    }
};
