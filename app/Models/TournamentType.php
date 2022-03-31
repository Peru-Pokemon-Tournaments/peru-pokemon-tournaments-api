<?php

namespace App\Models;

use App\Traits\Uuid;
use Database\Factories\TournamentTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentType extends Model
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
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TournamentTypeFactory::new();
    }

    /**
     * The tournament of the type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tournament()
    {
        return $this->hasOne(Tournament::class, 'tournament_id', 'id');
    }
}
