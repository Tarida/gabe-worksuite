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
        Schema::create('overtime_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('overtime_requests_company_id_foreign');
            $table->unsignedInteger('user_id')->index('overtime_requests_user_id_foreign');
            $table->unsignedBigInteger('overtime_policy_id')->index('overtime_requests_overtime_policy_id_foreign');
            $table->date('date')->nullable();
            $table->double('hours', null, 0)->default(0);
            $table->double('minutes', null, 0)->default(0);
            $table->double('amount', null, 0)->default(0);
            $table->text('overtime_reason')->nullable();
            $table->enum('type', ['working', 'holiday', 'dayoff'])->default('working');
            $table->enum('status', ['accept', 'reject', 'pending'])->default('pending');
            $table->enum('save_type', ['draft', 'save'])->default('draft');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedInteger('action_by')->nullable()->index('overtime_requests_action_by_foreign');
            $table->string('batch_key', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime_requests');
    }
};
