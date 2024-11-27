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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->string('agreement_number')->unique(); // Shartnoma raqami
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // Relates to Customer
            $table->dateTime('agreement_date'); // Shartnoma sanasi va soati
            $table->integer('duration_months'); // Muddati (necha oyga)
            $table->date('end_date'); // Tugash sanasi
            $table->decimal('prepayment', 10, 2)->nullable(); // Oldindan to'lov (mavjud bo'lsa)
            $table->string('product_name'); // Mahsulot nomi
            $table->integer('product_quantity'); // Mahsulot soni
            $table->decimal('product_cost_price', 10, 2); // Mahsulot tan narxi
            $table->decimal('product_markup', 10, 2); // Mahsulot ustamasi foizda yoki summada
            $table->decimal('product_price', 10, 2); // Mahsulotning ustamadan keyingi narxi
            $table->text('notes')->nullable(); // Izoh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreements');
    }
};
