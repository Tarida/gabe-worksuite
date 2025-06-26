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
        Schema::table('recruit_job_alerts', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['location_id'])->references(['id'])->on('company_addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_category_id'])->references(['id'])->on('recruit_job_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_type_id'])->references(['id'])->on('recruit_job_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_work_experience_id'])->references(['id'])->on('recruit_work_experiences')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_alerts', function (Blueprint $table) {
            $table->dropForeign('recruit_job_alerts_company_id_foreign');
            $table->dropForeign('recruit_job_alerts_location_id_foreign');
            $table->dropForeign('recruit_job_alerts_recruit_job_category_id_foreign');
            $table->dropForeign('recruit_job_alerts_recruit_job_type_id_foreign');
            $table->dropForeign('recruit_job_alerts_recruit_work_experience_id_foreign');
        });
    }
};
