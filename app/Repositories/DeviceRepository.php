<?php

namespace App\Repositories;

use App\Contracts\Repositories\DeviceRepository as DeviceRepositoryContract;
use App\Models\Device;
use App\Traits\Repositories\CommonMethods;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class DeviceRepository implements DeviceRepositoryContract
{
    use CommonMethods;

    /**
     * Retrieves all models.
     *
     * @return Collection<Device>|Device[]
     */
    public function getAll(): Collection
    {
        return Device::all();
    }

    /**
     * Find one model by id.
     *
     * @param string $id
     * @return Device
     */
    public function findOne(string &$id): Device
    {
        return Device::find($id);
    }

    /**
     * Find many models by ids.
     *
     * @param  array $ids
     * @return Collection<Device>|Device[]
     */
    public function findMany(array $ids): Collection
    {
        return Device::findMany($ids);
    }

    /**
     * Retrieve all devices paginated.
     *
     * @param int $page
     * @param int|null $pageSize
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $page = 1, ?int $pageSize = null): LengthAwarePaginator
    {
        return Device::paginate($pageSize, ['*'], 'page', $page);
    }
}
