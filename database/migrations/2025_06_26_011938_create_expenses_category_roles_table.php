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
        Schema::create('expenses_category_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('expenses_category_roles_company_id_foreign');
            $table->unsignedBigInteger('expenses_category_id')->nullable()->index('expenses_category_roles_expenses_category_id_foreign');
            $table->unsignedInteger('role_id')->index('expenses_category_roles_role_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_category_roles');
    }
};
