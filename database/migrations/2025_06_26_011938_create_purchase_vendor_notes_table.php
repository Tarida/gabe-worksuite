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
        Schema::create('purchase_vendor_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('purchase_vendor_id')->index('purchase_vendor_notes_purchase_vendor_id_foreign');
            $table->string('note_title', 100);
            $table->boolean('note_type')->default(false);
            $table->text('note_details')->nullable();
            $table->boolean('ask_password')->default(false);
            $table->unsignedInteger('member_id')->nullable()->index('purchase_vendor_notes_member_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_vendor_notes');
    }
};
