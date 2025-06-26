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
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('issues_company_id_foreign');
            $table->mediumText('description');
            $table->unsignedInteger('user_id')->nullable()->index('issues_user_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('issues_project_id_foreign');
            $table->enum('status', ['pending', 'resolved'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
