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
        Schema::table('check_ins', function (Blueprint $table) {
            $table->foreign(['check_in_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['key_result_id'])->references(['id'])->on('key_results')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('check_ins', function (Blueprint $table) {
            $table->dropForeign('check_ins_check_in_by_foreign');
            $table->dropForeign('check_ins_company_id_foreign');
            $table->dropForeign('check_ins_key_result_id_foreign');
        });
    }
};
