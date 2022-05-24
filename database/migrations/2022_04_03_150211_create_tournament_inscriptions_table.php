<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_inscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tournament_id');
            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournaments')
                ->onDelete('cascade');
            $table->uuid('competitor_id');
            $table->foreign('competitor_id')
                ->references('id')
                ->on('competitors')
                ->onDelete('cascade');
            $table->uuid('pokemon_showdown_team_id');
            $table->foreign('pokemon_showdown_team_id')
                ->references('id')
                ->on('pokemon_showdown_teams')
                ->onDelete('cascade');
            $table->enum('status', [
                'accepted',
                'pending',
                'rejected',
            ]);
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
        Schema::dropIfExists('tournament_inscriptions');
    }
}
