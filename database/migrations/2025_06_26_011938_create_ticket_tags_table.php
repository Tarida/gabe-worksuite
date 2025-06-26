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
        Schema::create('ticket_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('ticket_tags_company_id_foreign');
            $table->unsignedInteger('tag_id')->index('ticket_tags_tag_id_foreign');
            $table->unsignedInteger('ticket_id')->index('ticket_tags_ticket_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_tags');
    }
};
