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
        Schema::create('universal_search', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('universal_search_company_id_foreign');
            $table->integer('searchable_id');
            $table->enum('module_type', ['ticket', 'invoice', 'notice', 'proposal', 'task', 'creditNote', 'client', 'employee', 'project', 'estimate', 'lead'])->nullable();
            $table->string('title');
            $table->string('route_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universal_search');
    }
};
