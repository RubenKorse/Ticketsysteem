<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(){

        $events = Event::whereDate('date', '>=', Carbon::tomorrow())
               ->orderBy('date', 'asc')
               ->get();

        return view('index', compact('events'));
    }
}
