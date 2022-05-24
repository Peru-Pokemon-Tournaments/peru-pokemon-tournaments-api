<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class FailedAuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'message' => 'No se pudo autenticar',
        ];
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
    }
}
