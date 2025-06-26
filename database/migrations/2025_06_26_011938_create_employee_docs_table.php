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
        Schema::create('employee_docs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('employee_docs_company_id_foreign');
            $table->unsignedInteger('user_id')->index('employee_docs_user_id_foreign');
            $table->string('name', 200);
            $table->string('filename', 200);
            $table->string('hashname', 200);
            $table->string('size', 200)->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('employee_docs_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('employee_docs_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_docs');
    }
};
