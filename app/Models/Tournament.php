<?php

namespace App\Models;

use App\Traits\Uuid;
use Carbon\Carbon;
use Database\Factories\TournamentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin Builder
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string|null $place
 * @property string|null $created_by_person_id
 * @property string|null $tournament_type_id
 * @property string|null $image_id
 * @property string|null $tournament_format_id
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $status
 * @property int $total_competitors
 * @property Person|null $createdBy
 * @property TournamentType|null $tournamentType
 * @property Collection|Device[] $devices
 * @property Collection|Game[] $games
 * @property Image|null $image
 * @property TournamentFormat|null $tournamentFormat
 * @property TournamentPrice|null $tournamentPrice
 * @property Collection|TournamentPrize[] $tournamentPrizes
 * @property Collection|TournamentRule[] $tournamentRules
 * @property Collection|TournamentSystem[] $tournamentSystems
 * @property ExternalBracket|null $externalBracket
 * @property Collection|TournamentInscription[] $tournamentInscriptions
 */
class Tournament extends Model
{
    use HasFactory;
    use Uuid;

    private const NOT_STARTED = 'NOT_STARTED';
    private const IN_PROGRESS = 'IN_PROGRESS';
    private const ENDED = 'ENDED';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tournaments';

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
        'title',
        'description',
        'place',
        'created_by_person_id',
        'tournament_type_id',
        'image_id',
        'tournament_format_id',
        'start_date',
        'end_date',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'status',
        'total_competitors',
    ];

    /**
     * Retrieve the status of the tournament.
     *
     * @return string
     */
    public function getStatusAttribute(): string
    {
        $now = Carbon::now();

        if ($now->lte($this->start_date)) {
            return self::NOT_STARTED;
        }

        if ($now->lte($this->end_date)) {
            return self::IN_PROGRESS;
        }

        return self::ENDED;
    }

    /**
     * Retrieve the total of competitors enrolled in the tournament.
     *
     * @return int
     */
    public function getTotalCompetitorsAttribute(): int
    {
        return TournamentInscription::where('tournament_id', $this->id)->count();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return TournamentFactory::new();
    }

    /**
     * The creator of the tournament.
     *
     * @return BelongsTo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'created_by_person_id', 'id');
    }

    /**
     * The tournament type of the tournament.
     *
     * @return BelongsTo
     */
    public function tournamentType(): BelongsTo
    {
        return $this->belongsTo(TournamentType::class, 'tournament_type_id', 'id');
    }

    /**
     * The devices allowed in the tournament.
     *
     * @return BelongsToMany
     */
    public function devices(): BelongsToMany
    {
        return $this->belongsToMany(Device::class, 'devices_of_tournaments');
    }

    /**
     * The games allowed in the tournament.
     *
     * @return BelongsToMany
     */
    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'games_of_tournaments');
    }

    /**
     * The image of the tournament.
     *
     * @return BelongsTo
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    /**
     * The tournament format of the tournament.
     *
     * @return BelongsTo
     */
    public function tournamentFormat(): BelongsTo
    {
        return $this->belongsTo(TournamentFormat::class, 'tournament_format_id', 'id');
    }

    /**
     * The tournament type of the tournament.
     *
     * @return HasOne
     */
    public function tournamentPrice(): HasOne
    {
        return $this->hasOne(TournamentPrice::class, 'tournament_id', 'id');
    }

    /**
     * The tournament type of the tournament.
     *
     * @return HasMany
     */
    public function tournamentPrizes(): HasMany
    {
        return $this->hasMany(TournamentPrize::class, 'tournament_id', 'id');
    }

    /**
     * The rules of the tournament.
     *
     * @return BelongsToMany
     */
    public function tournamentRules(): BelongsToMany
    {
        return $this->belongsToMany(TournamentRule::class, 'rules_of_tournaments');
    }

    /**
     * The tournament systems of the tournament.
     *
     * @return BelongsToMany
     */
    public function tournamentSystems(): BelongsToMany
    {
        return $this->belongsToMany(TournamentSystem::class, 'tournament_systems_of_tournaments');
    }

    /**
     * The external bracket of the tournament.
     *
     * @return HasOne
     */
    public function externalBracket(): HasOne
    {
        return $this->hasOne(ExternalBracket::class, 'tournament_id', 'id');
    }

    /**
     * The inscriptions of the tournament.
     *
     * @return HasMany
     */
    public function tournamentInscriptions(): HasMany
    {
        return $this->hasMany(TournamentInscription::class, 'tournament_id', 'id');
    }
}
