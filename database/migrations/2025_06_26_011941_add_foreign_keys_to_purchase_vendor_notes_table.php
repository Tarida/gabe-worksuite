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
        Schema::table('purchase_vendor_notes', function (Blueprint $table) {
            $table->foreign(['member_id'])->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['purchase_vendor_id'])->references(['id'])->on('purchase_vendors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_vendor_notes', function (Blueprint $table) {
            $table->dropForeign('purchase_vendor_notes_member_id_foreign');
            $table->dropForeign('purchase_vendor_notes_purchase_vendor_id_foreign');
        });
    }
};
