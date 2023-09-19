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
        Schema::create('brinquedos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomebrinquedo');
            $table->string('anobriquedo');
            $table->string('dtmanutecaobrinquedo');
            $table->string('funresponsavel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brinquedos');
    }
};
