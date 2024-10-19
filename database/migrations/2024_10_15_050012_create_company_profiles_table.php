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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->text('background_statement');
            $table->string('background_statement_photo')->nullable();
            $table->text('vision_statement');
            $table->string('vision_statement_photo')->nullable();
            $table->text('mission_statement');
            $table->string('mission_statement_photo')->nullable();
            $table->json('objectives');
            $table->string('objectives_photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
