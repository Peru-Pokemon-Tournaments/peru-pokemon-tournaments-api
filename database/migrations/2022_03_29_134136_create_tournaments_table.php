<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 150);
            $table->text('description');
            $table->string('place')->nullable();
            $table->uuid('tournament_type_id')->nullable();
            $table->foreign('tournament_type_id')
                ->references('id')
                ->on('tournament_types')
                ->onDelete('set null');
            $table->uuid('image_id')->nullable();
            $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->onDelete('set null');
            $table->uuid('tournament_format_id')->nullable();
            $table->foreign('tournament_format_id')
                ->references('id')
                ->on('tournament_formats')
                ->onDelete('set null');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        Schema::dropIfExists('tournaments');
    }
}
