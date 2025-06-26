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
        Schema::create('appreciations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('appreciations_company_id_foreign');
            $table->unsignedBigInteger('award_id')->index('appreciations_award_id_foreign');
            $table->unsignedInteger('award_to')->index('appreciations_award_to_foreign');
            $table->date('award_date');
            $table->string('image')->nullable();
            $table->text('summary')->nullable();
            $table->unsignedInteger('added_by')->index('appreciations_added_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appreciations');
    }
};
