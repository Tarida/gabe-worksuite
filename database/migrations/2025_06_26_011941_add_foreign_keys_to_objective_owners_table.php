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
        Schema::table('objective_owners', function (Blueprint $table) {
            $table->foreign(['objective_id'])->references(['id'])->on('objectives')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['owner_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('objective_owners', function (Blueprint $table) {
            $table->dropForeign('objective_owners_objective_id_foreign');
            $table->dropForeign('objective_owners_owner_id_foreign');
        });
    }
};
