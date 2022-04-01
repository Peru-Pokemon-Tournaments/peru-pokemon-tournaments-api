<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_prices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('symbol', 10)->default('S/.');
            $table->float('amount');
            $table->uuid('tournament_id')->unique();
            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournaments')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
