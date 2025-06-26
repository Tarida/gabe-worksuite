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
        Schema::create('purchase_vendor_user_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('purchase_vendor_user_notes_company_id_foreign');
            $table->unsignedInteger('user_id')->index('purchase_vendor_user_notes_user_id_foreign');
            $table->unsignedInteger('vendor_note_id')->index('purchase_vendor_user_notes_vendor_note_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendor_user_notes');
    }
};
