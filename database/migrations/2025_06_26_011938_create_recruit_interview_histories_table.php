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
        Schema::create('recruit_interview_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('recruit_interview_schedule_id')->nullable()->index('rih_recruit_interview_schedule_id_foreign');
            $table->unsignedInteger('user_id')->index('recruit_interview_histories_user_id_foreign');
            $table->unsignedInteger('recruit_interview_file_id')->nullable()->index('recruit_interview_histories_recruit_interview_file_id_foreign');
            $table->text('details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_interview_histories');
    }
};
