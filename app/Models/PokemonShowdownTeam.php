<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\PokemonShowdownTeamFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonShowdownTeam extends Model
{
    use HasFactory;
    use Uuid;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'uuid';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pokemon_showdown_teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'team',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PokemonShowdownTeamFactory::new();
    }

    /**
     * The tournament incription
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tournamentInscription()
    {
        return $this->hasOne(TournamentInscription::class, 'pokemon_showdown_team_id', 'id');
    }
}
