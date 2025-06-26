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
        Schema::create('recruit_application_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruit_job_application_id')->index('recruit_application_files_recruit_job_application_id_foreign');
            $table->string('filename');
            $table->string('hashname');
            $table->string('size');
            $table->text('description')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('recruit_application_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruit_application_files_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_application_files');
    }
};
