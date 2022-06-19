<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\BasicController;
use App\Http\Resources\Device\DeviceResource;
use App\Models\Device;
use Illuminate\Http\Response;

class GetDeviceController extends BasicController
{
    /**
     * Retrieve device.
     *
     * @param Device $device
     * @return Response
     */
    public function __invoke(Device $device): Response
    {
        return $this->responseBuilder
            ->setMessage(trans('endpoints.device.get_device.ok'))
            ->setResource('device', DeviceResource::make($device))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
