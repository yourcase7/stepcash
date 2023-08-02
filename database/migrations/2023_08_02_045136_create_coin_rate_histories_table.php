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
        Schema::create('coin_rate_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_rate_id');
            $table->foreign('coin_rate_id')->references('id')->on('coin_rates');
            $table->double('coin');
            $table->double('rupiah');
            $table->enum('type', ['add','cut']);
            $table->double('last_balance_coin');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_rate_histories');
    }
};
