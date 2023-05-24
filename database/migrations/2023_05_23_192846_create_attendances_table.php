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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('log_id');
            $table->bigInteger('user_id');
            $table->bigInteger('status_id')->comment('Default 7 means approved');
            $table->bigInteger('work_shift_id');
            $table->timestamp('in_date')->comment('check in date time');
            $table->string('behavior')->comment('O=>out, I=In');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
