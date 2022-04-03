<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('place');
            $table->float('score');
            $table->uuid('tournament_inscription_id');
            $table->foreign('tournament_inscription_id')
                ->references('id')
                ->on('tournament_inscriptions')
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
        Schema::dropIfExists('tournament_results');
    }
}
