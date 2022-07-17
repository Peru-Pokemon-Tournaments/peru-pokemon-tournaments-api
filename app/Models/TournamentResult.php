<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\TournamentResultFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @mixin Builder
 * @property string $id
 * @property int $place
 * @property float $score
 * @property string $tournament_inscription_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property TournamentInscription|null $tournamentInscription
 */
class TournamentResult extends Model
{
    use HasFactory;
    use Uuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tournament_results';

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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'place',
        'score',
        'tournament_inscription_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return TournamentResultFactory::new();
    }

    /**
     * The tournament inscription of the result.
     *
     * @return BelongsTo
     */
    public function tournamentInscription(): BelongsTo
    {
        return $this->belongsTo(TournamentInscription::class, 'tournament_inscription_id', 'id');
    }

    /**
     * @param Builder $builder
     * @param string $tournamentId
     * @return Builder
     */
    public function scopeFilterByTournament(Builder $builder, string $tournamentId): Builder
    {
        return $builder->whereHas('tournamentInscription', function (Builder $builder) use ($tournamentId) {
            $builder->filterByTournament($tournamentId);
        });
    }
}
