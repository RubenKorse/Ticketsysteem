<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    public function event(){

        $events = Event::all();

        return view('admin.event', compact('events'));
    }

    public function create(){

        return view('admin.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'category' => 'required',
            'price' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'date.required' => 'The date field is required.',
            'time.required' => 'The time field is required.',
            'location.required' => 'The location field is required.',
            'category.required' => 'The category field is required.',
            'price.required' => 'The price field is required'
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        $event->category = $request->category;
        $event->price =$request->price;
        $event->save();

        session()->flash('success', 'Event has been created successfully!');

        return redirect()->route('admin.event');
    }

    public function edit(Event $event)
    {
        return view('admin.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'category' => 'required',
            'price' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'date.required' => 'The date field is required.',
            'time.required' => 'The time field is required.',
            'location.required' => 'The location field is required.',
            'category.required' => 'The category field is required.',
            'price.required' => 'The price field is required'
        ]);

        $event = Event::find($event->id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        $event->category = $request->category;
        $event->price = $request->price;
        $event->save();

        session()->flash('success', 'Event has been updated successfully!');

        return redirect()->route('admin.event',);
    }


    public function destroy(Event $event)
{
    $event->delete();

    session()->flash('success', 'Event has been successfully deleted!');

    return redirect()->route('admin.event');
}

}
