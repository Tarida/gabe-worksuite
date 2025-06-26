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
        Schema::create('discussions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('discussions_company_id_foreign');
            $table->unsignedInteger('discussion_category_id')->nullable()->default(1)->index('discussions_discussion_category_id_foreign');
            $table->unsignedInteger('project_id')->nullable()->index('discussions_project_id_foreign');
            $table->string('title');
            $table->string('color', 20)->nullable()->default('#232629');
            $table->unsignedInteger('user_id')->index('discussions_user_id_foreign');
            $table->boolean('pinned')->default(false);
            $table->boolean('closed')->default(false);
            $table->softDeletes();
            $table->timestamp('last_reply_at')->useCurrent();
            $table->unsignedInteger('best_answer_id')->nullable()->index('discussions_best_answer_id_foreign');
            $table->unsignedInteger('last_reply_by_id')->nullable()->index('discussions_last_reply_by_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('discussions_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('discussions_last_updated_by_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussions');
    }
};
