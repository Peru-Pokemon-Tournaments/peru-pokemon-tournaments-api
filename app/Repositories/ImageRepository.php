<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImageRepository as ImageRepositoryContract;
use App\Models\Image;
use App\Traits\Repositories\CommonMethods;

final class ImageRepository implements ImageRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Image::all();
    }

    /**
     * Find one model by id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOne(string &$id)
    {
        return Image::find($id);
    }
}
