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
        Schema::create('recruit_interview_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruit_interview_schedule_id')->index('rie_recruit_interview_schedule_id_foreign');
            $table->unsignedInteger('user_id')->index('recruit_interview_employees_user_id_foreign');
            $table->enum('user_accept_status', ['accept', 'refuse', 'waiting'])->default('waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_interview_employees');
    }
};
