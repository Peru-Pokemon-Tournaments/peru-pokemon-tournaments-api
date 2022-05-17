<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
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
    protected $keyType = 'string';

    /**
     * Retrieve the super admin role
     *
     * @return Role
     */
    public static function superAdminRole()
    {
        return Role::where('name', 'super admin')->first();
    }

    /**
     * Retrieve the competitor role
     *
     * @return Role
     */
    public static function competitorRole()
    {
        return Role::where('name', 'competitor')->first();
    }
}
