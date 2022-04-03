<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\TournamentInscriptionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentInscription extends Model
{
    use HasFactory;
    use Uuid;

    /**
     * Accepted status
     *
     * @var string
     */
    public const ACCEPTED = 'accepted';

    /**
     * Pending status
     *
     * @var string
     */
    public const PENDING = 'pending';

    /**
     * Rejected status
     *
     * @var string
     */
    public const REJECTED = 'rejected';

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
    protected $table = 'tournament_inscriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'competitor_id',
        'tournament_id',
        'pokemon_showdown_team_id',
        'status',
        'team',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TournamentInscriptionFactory::new();
    }

    /**
     * The competitor has inscripted
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competitor()
    {
        return $this->belongsTo(Competitor::class, 'competitor_id', 'id');
    }

    /**
     * The tournament belongs to the inscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'id');
    }

    /**
     * The team of the inscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pokemonShowdownTeam()
    {
        return $this->belongsTo(PokemonShowdownTeam::class, 'pokemon_showdown_team_id', 'id');
    }

    /**
     * The result of the inscription and tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tournamentResult()
    {
        return $this->hasOne(TournamentResult::class, 'tournament_inscription_id', 'id');
    }
}
