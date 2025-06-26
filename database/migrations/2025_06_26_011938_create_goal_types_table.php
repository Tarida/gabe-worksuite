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
        Schema::create('goal_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable()->index('goal_types_company_id_foreign');
            $table->enum('type', ['individual', 'department', 'company'])->default('individual');
            $table->boolean('view_by_owner')->default(false);
            $table->boolean('manage_by_owner')->default(false);
            $table->boolean('view_by_manager')->default(false);
            $table->boolean('manage_by_manager')->default(false);
            $table->text('view_by_roles')->nullable();
            $table->text('manage_by_roles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_types');
    }
};
