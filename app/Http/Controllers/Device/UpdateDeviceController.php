<?php

namespace App\Http\Controllers\Device;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Device\UpdateDeviceRequest;
use App\Http\Resources\Device\DeviceResource;
use App\Models\Device;
use App\Services\Device\UpdateDeviceService;
use Illuminate\Http\Response;

class UpdateDeviceController extends BasicController
{
    /**
     * The UpdateDeviceService.
     *
     * @var UpdateDeviceService
     */
    private UpdateDeviceService $updateDeviceService;

    /**
     * Create a new UpdateDeviceController instance.
     *
     * @param UpdateDeviceService $updateDeviceService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdateDeviceService $updateDeviceService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updateDeviceService = $updateDeviceService;
    }

    /**
     * Update device.
     *
     * @param Device $device
     * @param UpdateDeviceRequest $request
     * @return Response
     */
    public function __invoke(Device $device, UpdateDeviceRequest $request): Response
    {
        $device = ($this->updateDeviceService)(
            $device,
            $request->validated()
        );

        return $this->responseBuilder
            ->setMessage(trans('endpoints.device.update_device.ok'))
            ->setResource('device', DeviceResource::make($device))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
