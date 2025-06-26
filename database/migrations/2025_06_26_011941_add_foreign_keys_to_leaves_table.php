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
        Schema::table('leaves', function (Blueprint $table) {
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['approved_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['leave_type_id'])->references(['id'])->on('leave_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropForeign('leaves_added_by_foreign');
            $table->dropForeign('leaves_approved_by_foreign');
            $table->dropForeign('leaves_company_id_foreign');
            $table->dropForeign('leaves_last_updated_by_foreign');
            $table->dropForeign('leaves_leave_type_id_foreign');
            $table->dropForeign('leaves_user_id_foreign');
        });
    }
};
