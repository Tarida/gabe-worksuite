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
        Schema::create('offer_letter_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('recruit_job_offer_letter_id')->nullable()->index('offer_letter_histories_recruit_job_offer_letter_id_foreign');
            $table->unsignedInteger('user_id')->index('offer_letter_histories_user_id_foreign');
            $table->unsignedInteger('recruit_job_offer_file_id')->nullable()->index('offer_letter_histories_recruit_job_offer_file_id_foreign');
            $table->text('details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_letter_histories');
    }
};
