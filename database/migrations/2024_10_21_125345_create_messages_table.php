<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->uuid('_id')->unique();

            // Foreign key for sender_id referencing users.id
            $table->foreignId('sender_id')
            ->constrained('users')
            ->cascadeOnDelete()
                ->cascadeOnUpdate();

            // Foreign key for receiver_id referencing users.id
            $table->foreignId('receiver_id')
            ->constrained('users')
            ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->text('message');
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};