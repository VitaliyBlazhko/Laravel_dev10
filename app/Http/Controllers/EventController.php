<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

//        dd($events->find('72')->category()->create(['name' => 'News', 'description'=> 'News category']));
//        dd($events->find('72')->category()->toggle([7, 9]));
        return view('events.index', [
            'events' => $events
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'notes' => ['required', 'string'],
            'dt_start' => ['date'],
            'dt_end' => ['date']
        ]);
        $user = User::query()->findOrFail($data['user_id']);

        $user->events()->create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'notes' => $data['notes'],
            'dt_start' => $data['dt_start'],
            'dt_end' => $data['dt_end']
        ]);
        return back()->with('success', 'Event created successfully.');

    }

    public function item($id)
    {
        $event = Event::findOrFail($id);
        $userId = $event->user_id;
        $user = User::query()->findOrFail($userId);

        return view('events.item', [
            'event' => $event,
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'notes' => ['required', 'string'],
            'dt_start' => ['date'],
            'dt_end' => ['date']
        ]);
        $user = User::query()->findOrFail($data['user_id']);

        $user->events()->update([
            'title' => $data['title'],
            'notes' => $data['notes'],
            'dt_start' => $data['dt_start'],
            'dt_end' => $data['dt_end']
        ]);
        return back()->with('success', 'Event updated successfully.');
    }

    public function delete($id)
    {

        $event = Event::query()->find($id)->delete();

        return Redirect::route('events.index');
    }
}
