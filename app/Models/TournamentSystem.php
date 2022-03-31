<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\TournamentSystemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentSystem extends Model
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
        'name',
        'description',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TournamentSystemFactory::new();
    }

    /**
     * The tournaments belongs to the tournament system
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_systems_of_tournaments');
    }
}
