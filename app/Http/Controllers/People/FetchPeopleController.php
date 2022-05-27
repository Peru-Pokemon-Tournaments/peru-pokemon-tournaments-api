<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\FetchPeopleRequest;
use App\Http\Resources\Person\PersonResource;
use App\Services\People\FetchPeopleService;
use Illuminate\Http\Response;

class FetchPeopleController extends Controller
{
    /**
     * The fetch people service.
     *
     * @var FetchPeopleService
     */
    private FetchPeopleService $fetchPeopleService;

    /**
     * Creates a new FetchPeopleController instance.
     *
     * @param FetchPeopleService $fetchPeopleService
     */
    public function __construct(FetchPeopleService $fetchPeopleService)
    {
        $this->fetchPeopleService = $fetchPeopleService;
    }

    /**
     * Retrieve all people paginated.
     *
     * @param FetchPeopleRequest $request
     * @return Response
     */
    public function __invoke(FetchPeopleRequest $request): Response
    {
        $peoplePaginated = ($this->fetchPeopleService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return response(
            [
                'message' => 'Personas encontrados',
                'people' => PersonResource::collection($peoplePaginated),
                'total' => $peoplePaginated->total(),
                'per_page' => $peoplePaginated->perPage(),
                'current_page' => $peoplePaginated->currentPage(),
                'last_page' => $peoplePaginated->lastPage(),
                'total_pages' => ceil($peoplePaginated->total() / $peoplePaginated->perPage()),
            ],
            Response::HTTP_OK
        );
    }
}
