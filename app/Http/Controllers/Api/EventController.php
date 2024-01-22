<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getAllEvents()
    {
        return new EventCollection(Event::query()->cursorPaginate(5));
    }

    public function getEvent($id)
    {

        return new EventResource(Event::query()->findOrFail($id));
    }

    public function eventUpdate(EventFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        return new EventResource($event);

    }

    public function eventDelete($id)
    {
        Event::query()->findOrFail($id)->delete();

    }
}
