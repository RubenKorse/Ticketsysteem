<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class PublicController extends Controller
{
    public function index(){

        $events = Event::whereDate('date', '>=', Carbon::tomorrow())
               ->orderBy('date', 'asc')
               ->get();

        return view('index', compact('events'));
    }

    public function sports(){
        $events = Event::where('category', 'sport')
                       ->whereDate('date', '>=', Carbon::tomorrow())
                       ->orderBy('date', 'asc')
                       ->get();

        return view('sports', compact('events'));
    }

    public function festivals(){
        $events = Event::where('category', 'festival')
                       ->whereDate('date', '>=', Carbon::tomorrow())
                       ->orderBy('date', 'asc')
                       ->get();

        return view('festivals', compact('events'));
    }

    public function films(){
        $events = Event::where('category', 'films')
                       ->whereDate('date', '>=', Carbon::tomorrow())
                       ->orderBy('date', 'asc')
                       ->get();

        return view('films', compact('events'));
    }
}
