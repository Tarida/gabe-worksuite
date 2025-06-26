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
        Schema::table('awards', function (Blueprint $table) {
            $table->foreign(['award_icon_id'])->references(['id'])->on('award_icons')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('awards', function (Blueprint $table) {
            $table->dropForeign('awards_award_icon_id_foreign');
            $table->dropForeign('awards_company_id_foreign');
        });
    }
};
