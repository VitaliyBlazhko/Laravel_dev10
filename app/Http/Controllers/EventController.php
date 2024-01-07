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

        return view('events.index', [
            'events' => $events
        ]);
    }

    public function create(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::query()->findOrFail($userId);

        $user->events()->create([
            'user_id' => $userId,
            'title' => 'Title 1',
            'notes' => 'Notes 1',
            'dt_start' => '01.02.2024',
            'dt_end' => '02.02.2024'
        ]);
        return Redirect::route('events.index');


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

    public function update($id)
    {
        $event = Event::query()->findOrFail($id);
        $event->update([
            'title' => 'Title 10',
            'notes' => 'Notes 10',
            'dt_start' => '10.02.2024',
            'dt_end' => '11.02.2024',
        ]);

        return Redirect::route('events.index');
    }

    public function delete($id)
    {

        $event = Event::query()->find($id)->delete();

        return Redirect::route('events.index');
    }
}
