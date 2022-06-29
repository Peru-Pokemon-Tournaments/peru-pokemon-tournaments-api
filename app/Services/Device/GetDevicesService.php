<?php

namespace App\Services\Device;

use App\Contracts\Repositories\DeviceRepository;
use App\Models\Device;
use Illuminate\Support\Collection;

class GetDevicesService
{
    /**
     * The device repository.
     *
     * @var DeviceRepository
     */
    private DeviceRepository $deviceRepository;

    /**
     * Create a new GetDevicesService instance.
     *
     * @param DeviceRepository $deviceRepository
     */
    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * Retrieves all devices.
     *
     * @return Collection|Device[]
     */
    public function __invoke(): Collection
    {
        return $this->deviceRepository->getAll();
    }
}
