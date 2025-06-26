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
        Schema::table('appreciations', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['award_id'])->references(['id'])->on('awards')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['award_to'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appreciations', function (Blueprint $table) {
            $table->dropForeign('appreciations_added_by_foreign');
            $table->dropForeign('appreciations_award_id_foreign');
            $table->dropForeign('appreciations_award_to_foreign');
            $table->dropForeign('appreciations_company_id_foreign');
        });
    }
};
