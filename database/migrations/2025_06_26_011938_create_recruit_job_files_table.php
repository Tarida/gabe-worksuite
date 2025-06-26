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
        Schema::create('recruit_job_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('recruit_job_files_user_id_foreign');
            $table->unsignedBigInteger('recruit_job_id')->index('recruit_job_files_recruit_job_id_foreign');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->string('google_url')->nullable();
            $table->string('hashname')->nullable();
            $table->string('size')->nullable();
            $table->string('dropbox_link')->nullable();
            $table->string('external_link')->nullable();
            $table->string('external_link_name')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('recruit_job_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruit_job_files_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_job_files');
    }
};
