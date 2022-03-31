<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentSystemsOfTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_systems_of_tournaments', function (Blueprint $table) {
            $table->string('description')->nullable();
            $table->uuid('tournament_system_id');
            $table->foreign('tournament_system_id')
                ->references('id')
                ->on('tournament_systems')
                ->onDelete('cascade');
            $table->uuid('tournament_id');
            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournaments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournament_systems_of_tournaments');
    }
}
