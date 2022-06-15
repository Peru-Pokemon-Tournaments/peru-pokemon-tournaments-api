<?php

namespace App\Http\Controllers\Device;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Device\CreateDeviceRequest;
use App\Http\Resources\Device\DeviceResource;
use App\Services\Device\CreateDeviceService;
use Illuminate\Http\Response;

class CreateDeviceController extends BasicController
{
    /**
     * The CreateDeviceService.
     *
     * @var CreateDeviceService
     */
    private CreateDeviceService $createDeviceService;

    /**
     * Create a new CreateDeviceController instance.
     *
     * @param CreateDeviceService $createDeviceService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreateDeviceService $createDeviceService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createDeviceService = $createDeviceService;
    }

    /**
     * Create device.
     *
     * @param CreateDeviceRequest $request
     * @return Response
     */
    public function __invoke(CreateDeviceRequest $request): Response
    {
        $device = ($this->createDeviceService)($request->validated());

        return $this->responseBuilder
            ->setMessage(trans('endpoints.device.create_device.created'))
            ->setResource('device', DeviceResource::make($device))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
