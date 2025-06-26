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
        Schema::create('leave_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('leave_files_company_id_foreign');
            $table->unsignedInteger('user_id')->index('leave_files_user_id_foreign');
            $table->unsignedInteger('leave_id')->index('leave_files_leave_id_foreign');
            $table->string('filename');
            $table->string('hashname')->nullable();
            $table->string('size')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('leave_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('leave_files_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_files');
    }
};
