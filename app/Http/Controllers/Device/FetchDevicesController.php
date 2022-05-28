<?php

namespace App\Http\Controllers\Device;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\Device\FetchDevicesRequest;
use App\Http\Resources\Device\DeviceResource;
use App\Services\Device\FetchDevicesService;
use Illuminate\Http\Response;

class FetchDevicesController extends PaginatedController
{
    /**
     * The fetch device service.
     *
     * @var FetchDevicesService
     */
    private FetchDevicesService $fetchDevicesService;

    /**
     * Creates a new FetchDevicesController instance.
     *
     * @param FetchDevicesService $fetchDevicesService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchDevicesService $fetchDevicesService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchDevicesService = $fetchDevicesService;
    }

    /**
     * Retrieve all devices paginated.
     *
     * @param FetchDevicesRequest $request
     * @return Response
     */
    public function __invoke(FetchDevicesRequest $request): Response
    {
        $devicesPaginated = ($this->fetchDevicesService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return $this->paginatedResponseBuilder
            ->setMessage(trans('endpoints.device.fetch_devices.ok'))
            ->setResources('devices', DeviceResource::collection($devicesPaginated))
            ->setLengthAwarePaginator($devicesPaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
