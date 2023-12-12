<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function show(Event $event){
        return view('ticket', compact('event'));
    }

    public function store(Request $request, $event_id){

        $user = Auth::user();
        $event = Event::find($event_id);

        $request->validate([
            'ticketQuantity' => 'required|integer|min:1',
        ]);

        $reservation = new reservation([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'nr' => $request->input('ticketQuantity'),
        ]);

        $reservation->save();

        for ($i = 0; $i < $request->input('ticketQuantity'); $i++) {
            $ticket = new Ticket([
                'type' => $event->title,
                'is_used' => false,
                'reservation_id' => $reservation->id,
            ]);

            $ticket->save();
        }

        session()->flash('success', 'Tickets successfully bought!');
        return redirect()->route('confirmation', ['event' => $event, 'reservation' => $reservation]);
    }

    public function showConfirmation(Event $event, Reservation $reservation)
{
    $reservation->load('tickets');
    $totalPrice = $reservation->event->price * $reservation->nr;

    return view('confirmation', compact('reservation', 'totalPrice'));
}

}
