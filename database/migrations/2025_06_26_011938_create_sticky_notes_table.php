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
        Schema::create('sticky_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('sticky_notes_company_id_foreign');
            $table->unsignedInteger('user_id')->index('sticky_notes_user_id_foreign');
            $table->mediumText('note_text');
            $table->enum('colour', ['blue', 'yellow', 'red', 'gray', 'purple', 'green'])->default('blue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sticky_notes');
    }
};
