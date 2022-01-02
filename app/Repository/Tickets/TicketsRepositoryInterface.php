<?php

namespace App\Repository\Tickets;

interface TicketsRepositoryInterface
{
    public function generateTicket(array $payload) : array;
}
