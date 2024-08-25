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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('gender');
            $table->string('country');
            $table->date('enrollment_date');
            $table->string('occupation');
            $table->string('field_of_study');
            $table->string('company');
            $table->string('mode_of_class');
            $table->string('time_for_class');
            $table->timestamps();

            // define foreign key constraints
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
