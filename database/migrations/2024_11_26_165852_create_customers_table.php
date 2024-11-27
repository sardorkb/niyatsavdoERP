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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // F.I.Sh.
            $table->string('passport')->unique(); // Pasport raqami yoki JSHSHIR
            $table->string('address'); // Yashash manzili
            $table->string('mfy'); // MFY
            $table->string('workplace')->nullable(); // Ish joyi
            $table->string('phone_number'); // Telefon raqami
            $table->string('additional_phone_number')->nullable(); // Qo'shimcha telefon raqami
            $table->text('notes')->nullable(); // Izoh
            $table->string('photo_path')->nullable(); // Photo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
