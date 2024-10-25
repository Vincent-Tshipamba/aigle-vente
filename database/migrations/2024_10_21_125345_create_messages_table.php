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
            $table->foreignId('sender_id')->constrained('users', 'id', 'sender_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('receiver_id')->constrained('users', 'id', 'receiver_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};