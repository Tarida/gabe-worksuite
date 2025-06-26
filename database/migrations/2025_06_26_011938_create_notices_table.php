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
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('notices_company_id_foreign');
            $table->string('to')->default('employee');
            $table->string('heading');
            $table->mediumText('description')->nullable();
            $table->unsignedInteger('department_id')->nullable()->index('notices_department_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('notices_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('notices_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
