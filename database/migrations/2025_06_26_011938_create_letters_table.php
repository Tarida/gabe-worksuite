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
        Schema::create('letters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->index('letters_company_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('letters_user_id_foreign');
            $table->unsignedInteger('template_id')->index('letters_template_id_foreign');
            $table->unsignedInteger('creator_id')->nullable()->index('letters_creator_id_foreign');
            $table->string('name')->nullable();
            $table->string('top');
            $table->string('right');
            $table->string('left');
            $table->string('bottom');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
