<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\TournamentInscriptionFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @mixin Builder
 * @property string $id
 * @property string $status
 * @property string $tournament_id
 * @property string $competitor_id
 * @property string $pokemon_showdown_team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property Competitor|null $competitor
 * @property PokemonShowdownTeam|null $pokemonShowdownTeam
 * @property Tournament|null $tournament
 * @property TournamentResult|null $tournamentResult
 * @property Collection|Tournament[] $tournaments
 */
class TournamentInscription extends Model
{
    use HasFactory;
    use Uuid;

    /**
     * Accepted status.
     *
     * @var string
     */
    public const ACCEPTED = 'accepted';

    /**
     * Pending status.
     *
     * @var string
     */
    public const PENDING = 'pending';

    /**
     * Rejected status.
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
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return TournamentInscriptionFactory::new();
    }

    /**
     * The competitor has signed up.
     *
     * @return BelongsTo
     */
    public function competitor(): BelongsTo
    {
        return $this->belongsTo(Competitor::class, 'competitor_id', 'id');
    }

    /**
     * The tournament belongs to the inscription.
     *
     * @return BelongsTo
     */
    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'id');
    }

    /**
     * The team of the inscription.
     *
     * @return BelongsTo
     */
    public function pokemonShowdownTeam(): BelongsTo
    {
        return $this->belongsTo(PokemonShowdownTeam::class, 'pokemon_showdown_team_id', 'id');
    }

    /**
     * The result of the inscription and tournament.
     *
     * @return HasOne
     */
    public function tournamentResult(): HasOne
    {
        return $this->hasOne(TournamentResult::class, 'tournament_inscription_id', 'id');
    }

    /**
     * @param Builder $builder
     * @param string $tournamentId
     * @return Builder
     */
    public function scopeFilterByTournament(Builder $builder, string $tournamentId): Builder
    {
        return $builder->where('tournament_id', '=', $tournamentId);
    }
}
