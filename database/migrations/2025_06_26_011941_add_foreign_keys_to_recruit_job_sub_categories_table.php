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
        Schema::table('recruit_job_sub_categories', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['recruit_job_category_id'])->references(['id'])->on('recruit_job_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruit_job_sub_categories', function (Blueprint $table) {
            $table->dropForeign('recruit_job_sub_categories_company_id_foreign');
            $table->dropForeign('recruit_job_sub_categories_recruit_job_category_id_foreign');
        });
    }
};
