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
        Schema::create('jangbus', function (Blueprint $table) {
            $table->id();

            $table->tinyinteger('io')->nullable();
            $table->date('writeday')->nullable();
            $table->integer('products_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('numi')->nullable();
            $table->integer('numo')->nullable();
            $table->integer('prices')->nullable();
            $table->string('bigo', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jangbus');
    }
};
