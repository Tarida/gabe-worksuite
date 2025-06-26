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
        Schema::table('products', function (Blueprint $table) {
            $table->string('design_style')->nullable();
            $table->text('main_function')->nullable();
            $table->text('special_features')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('code_alias')->nullable();
            $table->string('clonedFrom')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('design_style');
            $table->dropColumn('main_function');
            $table->dropColumn('special_features');
            $table->dropColumn('material');
            $table->dropColumn('color');
            $table->dropColumn('code_alias');
            $table->dropColumn('cloned_from');
        });
    }
};
