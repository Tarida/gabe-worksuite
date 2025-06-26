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
        Schema::create('recruit_job_offer_letter', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_job_offer_letter_company_id_foreign');
            $table->unsignedInteger('recruit_job_application_id')->nullable()->index('recruit_job_offer_letter_recruit_job_application_id_foreign');
            $table->unsignedBigInteger('recruit_job_id')->nullable()->index('recruit_job_offer_letter_recruit_job_id_foreign');
            $table->unsignedInteger('employee_id')->nullable()->index('recruit_job_offer_letter_employee_id_foreign');
            $table->date('job_expire');
            $table->date('expected_joining_date');
            $table->double('comp_amount', null, 0)->nullable();
            $table->string('status');
            $table->enum('pay_according', ['hour', 'day', 'week', 'month', 'year']);
            $table->string('sign_require')->nullable();
            $table->integer('add_structure')->default(0);
            $table->string('sign_image')->nullable();
            $table->string('decline_reason')->nullable();
            $table->string('hash')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamp('offer_accept_at')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('recruit_job_offer_letter_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('recruit_job_offer_letter_last_updated_by_foreign');
            $table->timestamps();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_job_offer_letter');
    }
};
