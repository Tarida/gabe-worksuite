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
        Schema::create('recruit_custom_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_custom_questions_company_id_foreign');
            $table->enum('category', ['job_application', 'job_offer'])->default('job_application');
            $table->string('question');
            $table->enum('status', ['enable', 'disable'])->default('disable');
            $table->enum('type', ['text', 'number', 'password', 'textarea', 'select', 'radio', 'date', 'checkbox', 'file'])->default('text');
            $table->enum('required', ['yes', 'no'])->default('no');
            $table->string('values', 5000)->nullable();
            $table->integer('column_priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_custom_questions');
    }
};
