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
        Schema::table('offer_letter_histories', function (Blueprint $table) {
            $table->foreign(['recruit_job_offer_file_id'])->references(['id'])->on('recruit_job_offer_files')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_offer_letter_id'])->references(['id'])->on('recruit_job_offer_letter')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offer_letter_histories', function (Blueprint $table) {
            $table->dropForeign('offer_letter_histories_recruit_job_offer_file_id_foreign');
            $table->dropForeign('offer_letter_histories_recruit_job_offer_letter_id_foreign');
            $table->dropForeign('offer_letter_histories_user_id_foreign');
        });
    }
};
