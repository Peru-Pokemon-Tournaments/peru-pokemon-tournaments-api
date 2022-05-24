<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\TournamentPriceFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @mixin Builder
 * @property string $id
 * @property string $symbol
 * @property float $amount
 * @property string $tournament_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property Tournament|null $tournaments
 */
class TournamentPrice extends Model
{
    use HasFactory;
    use Uuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tournament_prices';

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
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return TournamentPriceFactory::new();
    }

    /**
     * The tournament belongs to the price.
     *
     * @return BelongsTo
     */
    public function tournaments(): BelongsTo
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'id');
    }
}
