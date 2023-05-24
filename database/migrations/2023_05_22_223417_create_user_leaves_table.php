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
            $table->bigInteger('assigned_by')->nullable();
            $table->bigInteger('leave_type_id');
            $table->bigInteger('user_id');
            $table->bigInteger('working_shift_details_id');
            $table->integer('status_id');
            $table->date('date')->nullable();
            $table->date('start_at');
            $table->date('end_at');
            $table->string('duration_type')->comment('e.g first_half, last_half, single');
            $table->string('reason')->nullable();
            $table->string('deleted_at')->nullable();
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
