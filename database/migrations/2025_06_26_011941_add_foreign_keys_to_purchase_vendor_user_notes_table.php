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
        Schema::table('purchase_vendor_user_notes', function (Blueprint $table) {
            $table->foreign(['company_id'])->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['vendor_note_id'])->references(['id'])->on('purchase_vendor_notes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_vendor_user_notes', function (Blueprint $table) {
            $table->dropForeign('purchase_vendor_user_notes_company_id_foreign');
            $table->dropForeign('purchase_vendor_user_notes_user_id_foreign');
            $table->dropForeign('purchase_vendor_user_notes_vendor_note_id_foreign');
        });
    }
};
