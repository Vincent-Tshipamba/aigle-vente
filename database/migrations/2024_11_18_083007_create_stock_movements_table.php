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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->uuid('_id')->unique(); 
            $table->unsignedBigInteger('product_id'); 
            $table->enum('type', ['add', 'remove'])->comment('Type de mouvement, ajout ou retrait');
            $table->integer('quantity')->comment('Quantité modifiée');
            $table->unsignedBigInteger('shop_id')->comment('Boutique responsable de la modification');
            $table->timestamps();

           
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
