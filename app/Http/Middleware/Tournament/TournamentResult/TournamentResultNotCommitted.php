<?php

namespace App\Http\Middleware\Tournament\TournamentResult;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Services\TournamentResult\CheckTournamentResultPlaceExists;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TournamentResultNotCommitted
{
    /**
     * The CheckTournamentResultPlaceExists Service.
     *
     * @var CheckTournamentResultPlaceExists
     */
    private CheckTournamentResultPlaceExists $checkTournamentResultPlaceExists;

    /**
     * The response builder.
     *
     * @var ResponseBuilder
     */
    private ResponseBuilder $responseBuilder;

    /**
     * Creates a new TournamentResultNotCommitted instance.
     *
     * @param CheckTournamentResultPlaceExists $checkTournamentResultPlaceExists
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CheckTournamentResultPlaceExists $checkTournamentResultPlaceExists,
        ResponseBuilder $responseBuilder
    ) {
        $this->checkTournamentResultPlaceExists = $checkTournamentResultPlaceExists;
        $this->responseBuilder = $responseBuilder;
    }

    /**
     * Handle the request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tournament = $request->route('tournament');
        $place = $request->input('place');
        $competitorId = $request->input('competitor_id');

        $exists = ($this->checkTournamentResultPlaceExists)(
            $place,
            $competitorId,
            $tournament
        );

        if ($exists) {
            return $this->responseBuilder
                 ->setMessage('El resultado ya existe para este torneo')
                 ->get();
        }

        return $next($request);
    }
}
