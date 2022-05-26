<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Http\Requests\Device\FetchDevicesRequest;
use App\Http\Resources\Device\DeviceResource;
use App\Services\Device\FetchDevicesService;
use Illuminate\Http\Response;

class FetchDevicesController extends Controller
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
     */
    public function __construct(FetchDevicesService $fetchDevicesService)
    {
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

        return response(
            [
                'message' => 'Dispositivos encontrados',
                'devices' => DeviceResource::collection($devicesPaginated),
                'total' => $devicesPaginated->total(),
                'per_page' => $devicesPaginated->perPage(),
                'current_page' => $devicesPaginated->currentPage(),
                'last_page' => $devicesPaginated->lastPage(),
                'total_pages' => ceil($devicesPaginated->total() / $devicesPaginated->perPage()),
            ],
            Response::HTTP_OK
        );
    }
}
