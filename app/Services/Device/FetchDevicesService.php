<?php

namespace App\Services\Device;

use App\Contracts\Repositories\DeviceRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FetchDevicesService
{
    /**
     * The device repository.
     *
     * @var DeviceRepository
     */
    private DeviceRepository $deviceRepository;

    /**
     * Create a new FetchDevicesService instance.
     *
     * @param DeviceRepository $deviceRepository
     */
    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * Retrieve all devices paginated.
     *
     * @param int $page
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function __invoke(int $page, int $pageSize): LengthAwarePaginator
    {
        return $this->deviceRepository->getPaginated($page, $pageSize);
    }
}
