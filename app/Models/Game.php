<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\GameFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
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
        'game_generation_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return GameFactory::new();
    }

    /**
     * The game generation of the game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gameGeneration()
    {
        return $this->belongsTo(GameGeneration::class, 'game_generation_id', 'id');
    }

    /**
     * The tournaments of the game
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'games_of_tournaments');
    }
}
