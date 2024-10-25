<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->uuid('_id')->unique();
            $table->integer('daily_counter')->default(1);
            $table->string('facture_number')->unique();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('total_tva', 10, 2);
            $table->decimal('total_ht', 10, 2);
            $table->decimal('total_ttc', 10, 2);
            $table->string('status')->default('Non payée');
            $table->date('date_facture');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};