<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\TournamentPriceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentPrice extends Model
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
        'symbol',
        'amount',
        'tournament_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TournamentPriceFactory::new();
    }

    /**
     * The tournament belongs to the price
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournaments()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'id');
    }
}
