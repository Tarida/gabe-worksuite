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
        Schema::create('objective_progress_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('objective_id')->index('objective_progress_statuses_objective_id_foreign');
            $table->decimal('objective_progress', 5);
            $table->decimal('time_left_percentage', 5);
            $table->enum('status', ['onTrack', 'atRisk', 'offTrack', 'completed']);
            $table->enum('color', ['success', 'warning', 'danger', 'primary']);
            $table->text('condition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objective_progress_statuses');
    }
};
