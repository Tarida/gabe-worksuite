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
        Schema::create('recruit_application_status', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('recruit_application_status_company_id_foreign');
            $table->string('status');
            $table->string('slug');
            $table->string('color');
            $table->integer('position');
            $table->unsignedBigInteger('recruit_application_status_category_id')->nullable()->index('ras_recruit_application_status_category_id_foreign');
            $table->enum('action', ['yes', 'no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruit_application_status');
    }
};
