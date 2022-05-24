<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * @mixin Builder
 * @property string $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property Collection|User[] $users
 * @method static Builder|Role permission($permissions)
 */
class Role extends SpatieRole
{
    use HasFactory;
    use Uuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
    protected $keyType = 'string';

    /**
     * Retrieve the super admin role.
     *
     * @return Role
     */
    public static function superAdminRole(): self
    {
        return self::where('name', 'super admin')->first();
    }

    /**
     * Retrieve the competitor role.
     *
     * @return Role
     */
    public static function competitorRole(): self
    {
        return self::where('name', 'competitor')->first();
    }
}
