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
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->string('clientele_photo')->nullable()->after('objectives_photo');
            $table->text('clientele_content')->nullable()->after('clientele_photo');
            $table->string('deliverables_photo')->nullable()->after('clientele_content');
            $table->text('deliverables_content')->nullable()->after('deliverables_photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'clientele_photo',
                'clientele_content',
                'deliverables_photo',
                'deliverables_content',
            ]);
        });
    }
};
