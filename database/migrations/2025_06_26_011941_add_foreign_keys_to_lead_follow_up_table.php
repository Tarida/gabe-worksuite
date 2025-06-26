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
        Schema::table('lead_follow_up', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['deal_id'])->references(['id'])->on('deals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lead_follow_up', function (Blueprint $table) {
            $table->dropForeign('lead_follow_up_added_by_foreign');
            $table->dropForeign('lead_follow_up_deal_id_foreign');
            $table->dropForeign('lead_follow_up_last_updated_by_foreign');
        });
    }
};
