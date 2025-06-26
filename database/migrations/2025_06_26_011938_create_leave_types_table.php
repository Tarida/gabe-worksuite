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
        Schema::create('leave_types', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable()->index('leave_types_company_id_foreign');
            $table->string('type_name');
            $table->string('color');
            $table->double('no_of_leaves', null, 0)->default(5);
            $table->boolean('paid')->default(true);
            $table->decimal('monthly_limit', 10)->default(0);
            $table->integer('effective_after')->nullable();
            $table->string('effective_type')->nullable();
            $table->string('unused_leave')->nullable();
            $table->boolean('encashed');
            $table->boolean('allowed_probation');
            $table->boolean('allowed_notice');
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->longText('department')->nullable();
            $table->longText('designation')->nullable();
            $table->longText('role')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->enum('leavetype', ['monthly', 'yearly'])->nullable();
            $table->enum('over_utilization', ['not_allowed', 'allow_paid', 'allow_unpaid'])->default('not_allowed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_types');
    }
};
