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
        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['department_id'])->references(['id'])->on('teams')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['recruit_job_category_id'])->references(['id'])->on('recruit_job_categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['recruit_job_sub_category_id'])->references(['id'])->on('recruit_job_sub_categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['recruit_job_type_id'])->references(['id'])->on('recruit_job_types')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['recruit_work_experience_id'])->references(['id'])->on('recruit_work_experiences')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->dropForeign('recruit_jobs_added_by_foreign');
            $table->dropForeign('recruit_jobs_company_id_foreign');
            $table->dropForeign('recruit_jobs_currency_id_foreign');
            $table->dropForeign('recruit_jobs_department_id_foreign');
            $table->dropForeign('recruit_jobs_last_updated_by_foreign');
            $table->dropForeign('recruit_jobs_recruit_job_category_id_foreign');
            $table->dropForeign('recruit_jobs_recruit_job_sub_category_id_foreign');
            $table->dropForeign('recruit_jobs_recruit_job_type_id_foreign');
            $table->dropForeign('recruit_jobs_recruit_work_experience_id_foreign');
        });
    }
};
