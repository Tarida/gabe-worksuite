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
        Schema::create('taskboard_columns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('taskboard_columns_company_id_foreign');
            $table->string('column_name');
            $table->string('slug')->nullable();
            $table->string('label_color');
            $table->integer('priority');
            $table->timestamps();

            $table->unique(['column_name', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taskboard_columns');
    }
};
