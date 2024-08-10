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
            $table->unsignedBigInteger('program');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('gender');
            $table->string('country');
            $table->date('date_added');
            $table->string('occupation');
            $table->string('field_of_study');
            $table->string('company');
            $table->string('mode_of_class');
            $table->string('time_for_class');
            $table->timestamps();
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
