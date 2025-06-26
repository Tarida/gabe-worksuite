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
        Schema::table('recruit_job_offer_letter', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['employee_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['recruit_job_application_id'])->references(['id'])->on('recruit_job_applications')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_id'])->references(['id'])->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_offer_letter', function (Blueprint $table) {
            $table->dropForeign('recruit_job_offer_letter_added_by_foreign');
            $table->dropForeign('recruit_job_offer_letter_company_id_foreign');
            $table->dropForeign('recruit_job_offer_letter_employee_id_foreign');
            $table->dropForeign('recruit_job_offer_letter_last_updated_by_foreign');
            $table->dropForeign('recruit_job_offer_letter_recruit_job_application_id_foreign');
            $table->dropForeign('recruit_job_offer_letter_recruit_job_id_foreign');
        });
    }
};
