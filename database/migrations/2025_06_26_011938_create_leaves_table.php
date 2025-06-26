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
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('leaves_company_id_foreign');
            $table->unsignedInteger('user_id')->index('leaves_user_id_foreign');
            $table->unsignedInteger('leave_type_id')->index('leaves_leave_type_id_foreign');
            $table->string('unique_id')->nullable();
            $table->string('duration');
            $table->date('leave_date')->index();
            $table->text('reason');
            $table->enum('status', ['approved', 'pending', 'rejected']);
            $table->text('reject_reason')->nullable();
            $table->boolean('paid')->default(false);
            $table->unsignedInteger('added_by')->nullable()->index('leaves_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('leaves_last_updated_by_foreign');
            $table->text('event_id')->nullable();
            $table->unsignedInteger('approved_by')->nullable()->index('leaves_approved_by_foreign');
            $table->dateTime('approved_at')->nullable();
            $table->string('half_day_type')->nullable();
            $table->timestamps();
            $table->enum('manager_status_permission', ['pre-approve', 'approved'])->nullable();
            $table->text('approve_reason')->nullable();
            $table->boolean('over_utilized')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
