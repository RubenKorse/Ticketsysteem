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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'category' => 'required|in:Sport,Festivals,Films',
            'image' => 'nullable|image',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title field must not exceed 255 characters.',
            'description.required' => 'The description field is required.',
            'date.required' => 'The date field is required.',
            'date.date' => 'Invalid date format.',
            'time.required' => 'The time field is required.',
            'time.date_format' => 'Invalid time format.',
            'location.required' => 'The location field is required.',
            'location.max' => 'The location field must not exceed 255 characters.',
            'category.required' => 'The category field is required.',
            'category.in' => 'Invalid category.',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        $event->category = $request->category;
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
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title field must not exceed 255 characters.',
            'description.required' => 'The description field is required.',
            'date.required' => 'The date field is required.',
            'date.date' => 'Invalid date format.',
            'time.required' => 'The time field is required.',
            'time.date_format' => 'Invalid time format.',
            'location.required' => 'The location field is required.',
            'location.max' => 'The location field must not exceed 255 characters.',
            'category.required' => 'The category field is required.',
            'category.in' => 'Invalid category.',
        ]);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        $event->category = $request->category;
        $event->save();

        session()->flash('success', 'Event has been updated successfully!');

        return redirect()->route('admin.event');
    }

    public function destroy(Event $event)
{
    $event->delete();

    session()->flash('success', 'Event has been successfully deleted!');

    return redirect()->route('admin.event');
}

}
