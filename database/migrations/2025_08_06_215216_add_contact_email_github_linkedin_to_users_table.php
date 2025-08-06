<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('current_team_id', function ($table) {
                $table->string('contact_email')->nullable();
                $table->string('github')->nullable();
                $table->string('linkedin')->nullable();
            });
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('contact_email');
            $table->dropColumn('github');
            $table->dropColumn('linkedin');
        });
    }
};
