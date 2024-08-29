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
        Schema::create('training_calendars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location');
            $table->timestamps();


            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_calendars');
    }
};
