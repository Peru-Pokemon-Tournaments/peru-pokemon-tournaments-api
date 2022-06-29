<?php

namespace App\Http\Controllers\Device;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Resources\Device\DeviceResource;
use App\Services\Device\GetDevicesService;
use Illuminate\Http\Response;

class GetDevicesController extends BasicController
{
    /**
     * The get devices service.
     *
     * @var GetDevicesService
     */
    private GetDevicesService $getDevicesService;

    /**
     * Create a new GetDevicesController instance.
     *
     * @param GetDevicesService $getDevicesService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        GetDevicesService $getDevicesService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->getDevicesService = $getDevicesService;
    }

    /**
     * Retrieve all devices.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $devices = ($this->getDevicesService)();

        return $this->responseBuilder
            ->setMessage(trans('endpoints.device.get_devices.ok'))
            ->setResources('devices', DeviceResource::collection($devices))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
