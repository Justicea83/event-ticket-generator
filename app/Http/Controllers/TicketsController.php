<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tickets\GenerateTicketRequest;
use App\Repository\Tickets\TicketsRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TicketsController extends Controller
{
    private TicketsRepositoryInterface $repository;

    function __construct(TicketsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function generateTicket(GenerateTicketRequest $request): JsonResponse
    {
        return response()->json($this->repository->generateTicket($request->all()));

        /*try {
            return response()->json($this->repository->generateTicket($request->all()));
        } catch (Exception $e) {
            return response('', Response::HTTP_BAD_REQUEST);
        }*/
    }
}
