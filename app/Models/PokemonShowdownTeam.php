<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\PokemonShowdownTeamFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @mixin Builder
 * @property string $id
 * @property string $team
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property TournamentInscription|null $tournamentInscription
 */
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
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return PokemonShowdownTeamFactory::new();
    }

    /**
     * The tournament inscription.
     *
     * @return HasOne
     */
    public function tournamentInscription(): HasOne
    {
        return $this->hasOne(TournamentInscription::class, 'pokemon_showdown_team_id', 'id');
    }
}
