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
        Schema::create('proposal_signs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('proposal_id')->index('proposal_signs_proposal_id_foreign');
            $table->string('full_name');
            $table->string('email');
            $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_signs');
    }
};
