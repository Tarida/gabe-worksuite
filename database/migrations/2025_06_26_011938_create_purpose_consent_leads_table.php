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
        Schema::create('purpose_consent_leads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('deal_id')->nullable()->index('purpose_consent_leads_deal_id_foreign');
            $table->unsignedInteger('purpose_consent_id')->index('purpose_consent_leads_purpose_consent_id_foreign');
            $table->enum('status', ['agree', 'disagree'])->default('agree');
            $table->string('ip')->nullable();
            $table->unsignedInteger('updated_by_id')->nullable()->index('purpose_consent_leads_updated_by_id_foreign');
            $table->text('additional_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purpose_consent_leads');
    }
};
