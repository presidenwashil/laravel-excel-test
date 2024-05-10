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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->bigInteger('time');
            $table->bigInteger('room_id');
            $table->bigInteger('course_id');
            $table->bigInteger('group_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
