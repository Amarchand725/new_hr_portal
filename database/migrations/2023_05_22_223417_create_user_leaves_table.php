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
        Schema::create('user_leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('leave_type_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(0)->comment('0=pending, 1=approved, 2=rejected');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration')->nullable();
            $table->string('behavior_type')->comment('e.g first_half, last_half, single');
            $table->string('reason')->nullable();
            $table->string('deleted_at')->nullable();

            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_leaves');
    }
};
