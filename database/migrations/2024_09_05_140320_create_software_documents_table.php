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
        Schema::create('software_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_software_id');
            $table->string('document_name');
            $table->string('document');
            $table->timestamps();

            $table->foreign('program_software_id')->references('id')->on('program_software')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_documents');
    }
};
