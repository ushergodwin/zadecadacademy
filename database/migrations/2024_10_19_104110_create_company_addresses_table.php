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
        Schema::create('company_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('office_name', 191);
            $table->string('office_address', 191);
            $table->string('office_po_box', 191);
            $table->string('office_email', 191);
            $table->string('office_line1', 191);
            $table->string('office_line2', 191)->nullable();
            $table->string('office_line3', 191)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_addresses');
    }
};
