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
        Schema::table('recruit_job_offer_files', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['recruit_job_offer_letter_id'])->references(['id'])->on('recruit_job_offer_letter')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_offer_files', function (Blueprint $table) {
            $table->dropForeign('recruit_job_offer_files_added_by_foreign');
            $table->dropForeign('recruit_job_offer_files_last_updated_by_foreign');
            $table->dropForeign('recruit_job_offer_files_recruit_job_offer_letter_id_foreign');
        });
    }
};
