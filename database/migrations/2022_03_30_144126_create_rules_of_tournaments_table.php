<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesOfTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_of_tournaments', function (Blueprint $table) {
            $table->uuid('tournament_rule_id');
            $table->foreign('tournament_rule_id')
                ->references('id')
                ->on('tournament_rules')
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
        Schema::dropIfExists('rules_of_tournaments');
    }
}
