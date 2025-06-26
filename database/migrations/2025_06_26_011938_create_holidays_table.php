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
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('holidays_company_id_foreign');
            $table->date('date')->index();
            $table->string('occassion', 100)->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('holidays_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('holidays_last_updated_by_foreign');
            $table->text('event_id')->nullable();
            $table->timestamps();
            $table->text('department_id_json')->nullable();
            $table->text('designation_id_json')->nullable();
            $table->text('employment_type_json')->nullable();
            $table->enum('notification_sent', ['yes', 'no'])->default('no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
