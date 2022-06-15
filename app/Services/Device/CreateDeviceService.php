<?php

namespace App\Services\Device;

use App\Contracts\Repositories\DeviceRepository;
use App\Models\Device;

class CreateDeviceService
{
    /**
     * The device repository.
     *
     * @var DeviceRepository
     */
    private DeviceRepository $deviceRepository;

    /**
     * Create a new CreateDeviceService instance.
     *
     * @param DeviceRepository $deviceRepository
     */
    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * Create a new device.
     *
     * @param array $attributes
     * @return Device
     */
    public function __invoke(array $attributes): Device
    {
        $device = new Device($attributes);

        $this->deviceRepository->save($device);

        return $device;
    }
}
