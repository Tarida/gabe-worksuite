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
        Schema::create('awards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('awards_company_id_foreign');
            $table->string('title');
            $table->unsignedBigInteger('award_icon_id')->nullable()->index('awards_award_icon_id_foreign');
            $table->text('summary')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('color_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
    }
};
