<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;
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

        session()->flash('success', 'Tickets successfully bought!');
        return redirect()->route('index');
    }
}
