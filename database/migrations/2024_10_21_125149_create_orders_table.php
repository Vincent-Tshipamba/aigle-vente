<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('_id')->unique();
            $table->integer('daily_counter')->default(1);
            $table->string('order_number')->unique();
            $table->date('order_date');
            $table->decimal('frais_livraison', 10, 2)->default(0);
            $table->string('status')->default('En attente');
            $table->foreignId('client_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};