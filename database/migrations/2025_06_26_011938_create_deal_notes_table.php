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
        Schema::create('deal_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('details')->nullable();
            $table->unsignedBigInteger('deal_id')->nullable()->index('deal_notes_deal_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('deal_notes_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('deal_notes_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deal_notes');
    }
};
