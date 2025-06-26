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
        Schema::create('deal_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('deal_id')->nullable()->index('deal_files_deal_id_foreign');
            $table->unsignedInteger('user_id')->index('lead_files_user_id_foreign');
            $table->string('filename', 200);
            $table->string('hashname', 200);
            $table->string('size', 200);
            $table->text('description')->nullable();
            $table->string('google_url')->nullable();
            $table->string('dropbox_link')->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('lead_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('lead_files_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deal_files');
    }
};
