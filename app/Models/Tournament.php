<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\TournamentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
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
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TournamentFactory::new();
    }

    /**
     * The creator of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(Person::class, 'created_by_person_id', 'id');
    }

    /**
     * The tournament type of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournamentType()
    {
        return $this->belongsTo(TournamentType::class, 'tournament_type_id', 'id');
    }

    /**
     * The devices allowed in the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function devices()
    {
        return $this->belongsToMany(Device::class, 'devices_of_tournaments');
    }

    /**
     * The games allowed in the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'games_of_tournaments');
    }

    /**
     * The image of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    /**
     * The tournament format of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournamentFormat()
    {
        return $this->belongsTo(TournamentFormat::class, 'tournament_format_id', 'id');
    }

    /**
     * The tournament type of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tournamentPrice()
    {
        return $this->hasOne(TournamentPrice::class, 'tournament_id', 'id');
    }

    /**
     * The tournament type of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tournamentPrizes()
    {
        return $this->hasMany(TournamentPrize::class, 'tournament_id', 'id');
    }

    /**
     * The rules of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tournamentRules()
    {
        return $this->belongsToMany(TournamentRule::class, 'rules_of_tournaments');
    }

    /**
     * The tournament systems of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tournamentSystems()
    {
        return $this->belongsToMany(TournamentSystem::class, 'tournament_systems_of_tournaments');
    }

    /**
     * The external bracket of the tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function externalBracket()
    {
        return $this->belongsTo(ExternalBracket::class, 'tournament_id', 'id');
    }
}
