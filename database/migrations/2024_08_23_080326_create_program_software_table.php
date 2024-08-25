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
        Schema::create('program_software', function (Blueprint $table) {
            $table->id();
            $table->text('software_name');
            $table->foreignId('program_id')->constrained('programs');
            $table->integer('no_of_sessions');
            $table->unsignedBigInteger('fee');
            $table->string('add_by', 60);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_software');
    }
};
