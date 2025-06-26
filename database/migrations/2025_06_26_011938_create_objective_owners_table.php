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
        Schema::create('objective_owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('objective_id')->index('objective_owners_objective_id_foreign');
            $table->unsignedInteger('owner_id')->nullable()->index('objective_owners_owner_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objective_owners');
    }
};
