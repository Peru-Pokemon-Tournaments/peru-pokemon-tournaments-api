<?php

namespace App\Services\Device;

use App\Contracts\Repositories\DeviceRepository;
use App\Models\Device;
use Illuminate\Database\Eloquent\Model;

class UpdateDeviceService
{
    /**
     * The device repository.
     *
     * @var DeviceRepository
     */
    private DeviceRepository $deviceRepository;

    /**
     * Create a new UpdateDeviceService instance.
     *
     * @param DeviceRepository $deviceRepository
     */
    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * Update a device.
     *
     * @param string|Device $device
     * @param array $attributes
     * @return Device|Model
     */
    public function __invoke($device, array $attributes): Device
    {
        $deviceId = $device;

        if ($device instanceof Device) {
            $deviceId = $device->id;
        }

        $this->deviceRepository->update($deviceId, $attributes);

        return $this->deviceRepository->findOne($deviceId);
    }
}
