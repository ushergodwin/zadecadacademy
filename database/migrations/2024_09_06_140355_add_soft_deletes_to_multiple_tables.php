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
        Schema::table('multiple_tables', function (Blueprint $table) {
            //
            // Add soft deletes to 'site_users' table
            Schema::table('site_users', function (Blueprint $table) {
                if (!Schema::hasColumn('site_users', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'contacts' table
            Schema::table('contacts', function (Blueprint $table) {
                if (!Schema::hasColumn('contacts', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'programs' table
            Schema::table('programs', function (Blueprint $table) {
                if (!Schema::hasColumn('programs', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'courses' table
            Schema::table('courses', function (Blueprint $table) {
                if (!Schema::hasColumn('courses', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'galleries' table
            Schema::table('galleries', function (Blueprint $table) {
                if (!Schema::hasColumn('galleries', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'choose_us' table
            Schema::table('choose_us', function (Blueprint $table) {
                if (!Schema::hasColumn('choose_us', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'images' table
            Schema::table('images', function (Blueprint $table) {
                if (!Schema::hasColumn('images', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'teams' table
            Schema::table('teams', function (Blueprint $table) {
                if (!Schema::hasColumn('teams', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'enrollments' table
            Schema::table('enrollments', function (Blueprint $table) {
                if (!Schema::hasColumn('enrollments', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'transactions' table
            Schema::table('transactions', function (Blueprint $table) {
                if (!Schema::hasColumn('transactions', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'curricula' table
            Schema::table('curricula', function (Blueprint $table) {
                if (!Schema::hasColumn('curricula', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'videos' table
            Schema::table('videos', function (Blueprint $table) {
                if (!Schema::hasColumn('videos', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'blogs' table
            Schema::table('blogs', function (Blueprint $table) {
                if (!Schema::hasColumn('blogs', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'blog_comments' table
            Schema::table('blog_comments', function (Blueprint $table) {
                if (!Schema::hasColumn('blog_comments', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'partners' table
            Schema::table('partners', function (Blueprint $table) {
                if (!Schema::hasColumn('partners', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'training_calendars' table
            Schema::table('training_calendars', function (Blueprint $table) {
                if (!Schema::hasColumn('training_calendars', 'deleted_at')) {
                    $table->softDeletes();
                }
            });

            // Add soft deletes to 'software_documents' table
            Schema::table('software_documents', function (Blueprint $table) {
                if (!Schema::hasColumn('software_documents', 'deleted_at')) {
                    $table->softDeletes();
                }
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('multiple_tables', function (Blueprint $table) {
            //
            // Drop soft deletes from 'site_users' table
            Schema::table('site_users', function (Blueprint $table) {
                if (Schema::hasColumn('site_users', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'contacts' table
            Schema::table('contacts', function (Blueprint $table) {
                if (Schema::hasColumn('contacts', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'programs' table
            Schema::table('programs', function (Blueprint $table) {
                if (Schema::hasColumn('programs', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'courses' table
            Schema::table('courses', function (Blueprint $table) {
                if (Schema::hasColumn('courses', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'galleries' table
            Schema::table('galleries', function (Blueprint $table) {
                if (Schema::hasColumn('galleries', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'choose_us' table
            Schema::table('choose_us', function (Blueprint $table) {
                if (Schema::hasColumn('choose_us', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'images' table
            Schema::table('images', function (Blueprint $table) {
                if (Schema::hasColumn('images', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'teams' table
            Schema::table('teams', function (Blueprint $table) {
                if (Schema::hasColumn('teams', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'enrollments' table
            Schema::table('enrollments', function (Blueprint $table) {
                if (Schema::hasColumn('enrollments', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'transactions' table
            Schema::table('transactions', function (Blueprint $table) {
                if (Schema::hasColumn('transactions', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'curricula' table
            Schema::table('curricula', function (Blueprint $table) {
                if (Schema::hasColumn('curricula', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'videos' table
            Schema::table('videos', function (Blueprint $table) {
                if (Schema::hasColumn('videos', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'blogs' table
            Schema::table('blogs', function (Blueprint $table) {
                if (Schema::hasColumn('blogs', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'blog_comments' table
            Schema::table('blog_comments', function (Blueprint $table) {
                if (Schema::hasColumn('blog_comments', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'partners' table
            Schema::table('partners', function (Blueprint $table) {
                if (Schema::hasColumn('partners', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'training_calendars' table
            Schema::table('training_calendars', function (Blueprint $table) {
                if (Schema::hasColumn('training_calendars', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });

            // Drop soft deletes from 'software_documents' table
            Schema::table('software_documents', function (Blueprint $table) {
                if (Schema::hasColumn('software_documents', 'deleted_at')) {
                    $table->dropSoftDeletes();
                }
            });
        });
    }
};
