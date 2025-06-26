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
        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['application_source_id'])->references(['id'])->on('application_sources')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['location_id'])->references(['id'])->on('company_addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_application_status_id'])->references(['id'])->on('recruit_application_status')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_file_id'])->references(['id'])->on('recruit_job_files')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_id'])->references(['id'])->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->dropForeign('recruit_job_applications_added_by_foreign');
            $table->dropForeign('recruit_job_applications_application_source_id_foreign');
            $table->dropForeign('recruit_job_applications_company_id_foreign');
            $table->dropForeign('recruit_job_applications_last_updated_by_foreign');
            $table->dropForeign('recruit_job_applications_location_id_foreign');
            $table->dropForeign('recruit_job_applications_recruit_application_status_id_foreign');
            $table->dropForeign('recruit_job_applications_recruit_job_file_id_foreign');
            $table->dropForeign('recruit_job_applications_recruit_job_id_foreign');
        });
    }
};
