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
        Schema::create('check_ins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('check_ins_company_id_foreign');
            $table->unsignedBigInteger('key_result_id')->index('check_ins_key_result_id_foreign');
            $table->text('progress_update');
            $table->double('current_value', 8, 2)->nullable();
            $table->decimal('objective_percentage');
            $table->enum('confidence_level', ['low', 'medium', 'high'])->default('low');
            $table->text('barriers')->nullable();
            $table->dateTime('check_in_date')->nullable();
            $table->unsignedInteger('check_in_by')->nullable()->index('check_ins_users_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_ins');
    }
};
