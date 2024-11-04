<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
        });
    }

    public function down(): void
    {
        //
    }
};
