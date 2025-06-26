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
        Schema::create('google_calendar_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('google_calendar_modules_company_id_foreign');
            $table->boolean('lead_status')->default(false);
            $table->boolean('leave_status')->default(false);
            $table->boolean('invoice_status')->default(false);
            $table->boolean('contract_status')->default(false);
            $table->boolean('task_status')->default(false);
            $table->boolean('event_status')->default(false);
            $table->boolean('holiday_status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_calendar_modules');
    }
};
