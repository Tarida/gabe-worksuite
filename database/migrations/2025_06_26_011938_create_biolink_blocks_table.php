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
        Schema::create('biolink_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('biolink_id')->nullable()->index('biolink_blocks_biolink_id_foreign');
            $table->string('type');
            $table->string('name')->nullable();
            $table->text('url')->nullable();
            $table->boolean('open_in_new_tab')->default(false);
            $table->string('text_color')->nullable()->default('#000000');
            $table->string('text_alignment')->nullable()->default('center');
            $table->string('background_color')->nullable()->default('#FFFFFF');
            $table->string('animation')->nullable();
            $table->string('heading_type')->nullable();
            $table->text('paragraph')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('avatar_size')->nullable();
            $table->string('object_fit')->default('cover');
            $table->string('border_radius')->default('straight');
            $table->string('border_width')->nullable()->default('0');
            $table->string('border_color')->nullable()->default('#000000');
            $table->string('border_style')->default('solid');
            $table->string('border_shadow_x')->nullable()->default('0');
            $table->string('border_shadow_y')->nullable()->default('0');
            $table->string('border_shadow_blur')->nullable()->default('20');
            $table->string('border_shadow_spread')->nullable()->default('0');
            $table->string('border_shadow_color')->nullable()->default('#00000010');
            $table->string('status')->default('active');
            $table->integer('position')->nullable();
            $table->string('icon_size')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('discord')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('reddit')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('spotify')->nullable();
            $table->string('threads')->nullable();
            $table->string('twitch')->nullable();
            $table->string('address')->nullable();
            $table->string('paypal_type')->nullable();
            $table->string('product_title')->nullable();
            $table->string('currency_code')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
            $table->string('placeholder')->nullable();
            $table->string('name_placeholder')->nullable();
            $table->string('button_text')->nullable();
            $table->string('thank_you_message')->nullable();
            $table->string('thank_you_url')->nullable();
            $table->boolean('show_agreement')->nullable()->default(false);
            $table->string('agreement_text')->nullable();
            $table->string('agreement_url')->nullable();
            $table->string('api_key')->nullable();
            $table->string('mailchimp_list')->nullable();
            $table->string('webhook_url')->nullable();
            $table->string('cancelled_payment_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biolink_blocks');
    }
};
