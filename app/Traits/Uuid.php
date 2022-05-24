<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
