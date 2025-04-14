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
        Schema::create('transactions', function (Blueprint $table) {
        $table->id();
         $table->unsignedBigInteger("customer_id"); // Foreign key to customers table
         $table->unsignedBigInteger("recipient_id")->nullable(); // Foreign key to customers table, nullable for transactions that don't have recipients
        $table->enum("type", ['deposit', 'withdraw', 'transfer']);
        $table->decimal('amount', 10, 2); // Use decimal for monetary values to ensure precision

        // Foreign Key constraints
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        $table->foreign('recipient_id')->references('id')->on('customers')->onDelete('set null'); // In case recipient is nullable

        $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
