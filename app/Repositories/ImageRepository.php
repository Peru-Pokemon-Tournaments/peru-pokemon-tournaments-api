<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImageRepository as ImageRepositoryContract;
use App\Models\Image;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Database\Eloquent\Collection;

final class ImageRepository implements ImageRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<Image>|Image[]
     */
    public function getAll(): Collection
    {
        return Image::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return Image
     */
    public function findOne(string &$id): Image
    {
        return Image::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<Image>|Image[]
     */
    public function findMany(array $ids): Collection
    {
        return Image::findMany($ids);
    }
}
