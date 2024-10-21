<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->uuid('_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string(column: 'email')->unique()->nullable();
            $table->string('phone');
            $table->enum('sexe', ['Masculin', 'Féminin']);
            $table->string('picture', 255)->nullable();
            $table->string('city');
            $table->text('address')->nullable();
            $table->foreignId('city_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};