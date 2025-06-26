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
        Schema::table('lead_agents', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['lead_category_id'])->references(['id'])->on('lead_category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lead_agents', function (Blueprint $table) {
            $table->dropForeign('lead_agents_added_by_foreign');
            $table->dropForeign('lead_agents_company_id_foreign');
            $table->dropForeign('lead_agents_last_updated_by_foreign');
            $table->dropForeign('lead_agents_lead_category_id_foreign');
            $table->dropForeign('lead_agents_user_id_foreign');
        });
    }
};
