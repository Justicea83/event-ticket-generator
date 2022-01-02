<?php

namespace App\Repository\Tickets;

use App\Helpers\Ticket;
use Illuminate\Support\Facades\Storage;

class TicketsRepository implements TicketsRepositoryInterface
{

    public function generateTicket(array $payload): array
    {
        [
            'ticketType' => $ticketType,
            'ticketAmount' => $ticketAmount,
            'ticketNumber' => $ticketNumber
        ] = $payload;

        //   throw new \InvalidArgumentException('an error occurred');
        // dd(sprintf("%s\%s.png",config('filesystems.disks.tickets.root'),'hey'));

        self::makeDirectories();
        $ticket = new Ticket(sprintf("%s-%s-%s", $ticketNumber, $ticketAmount, $ticketType), $ticketNumber);
        return $ticket->genTickets();

    }

    private static function makeDirectories()
    {
        if (!Storage::disk('local')->exists('public\\tickets')) {
            Storage::disk('local')->makeDirectory('public\\tickets');
        }
        if (!Storage::disk('local')->exists('public\\qr-codes')) {
            Storage::disk('local')->makeDirectory('public\\qr-codes');
        }
        if (!Storage::disk('local')->exists('public\\bar-codes')) {
            Storage::disk('local')->makeDirectory('public\\bar-codes');
        }
    }
}
