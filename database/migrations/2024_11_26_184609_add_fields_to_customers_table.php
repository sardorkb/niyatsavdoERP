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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('jshshir')->nullable()->after('passport_or_jshshir'); // JSHSHIR
            $table->date('passport_given_date')->nullable()->after('jshshir'); // Passport given date
            $table->date('date_of_birth')->nullable()->after('passport_given_date'); // Date of birth
            $table->string('region')->nullable()->after('date_of_birth'); // Region
            $table->string('city_or_town')->nullable()->after('region'); // City or town
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['jshshir', 'passport_given_date', 'date_of_birth', 'region', 'city_or_town']);
        });
    }
};
