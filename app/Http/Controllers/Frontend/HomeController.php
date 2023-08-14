<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $eventCountDown = Event::query()
            ->where('start_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->first();

        $now_coming_event = Event::query()
            ->where('start_date', '>=', now())
            ->orWhere('start_date', '<=', now())
            ->where('end_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->first();

        $last_events = Event::query()->where('end_date', '<', now())->get();
        return view('frontend.home', compact('eventCountDown', 'now_coming_event', 'last_events'));
    }

    public function events()
    {
        $eventCountDown = Event::query()
            ->where('start_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->first();

        $now_coming_event = Event::query()
            ->where('start_date', '>=', now())
            ->orWhere('start_date', '<=', now())
            ->where('end_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->first();

        $upcoming_events = Event::query()
            ->where('start_date', '>=', now())
            ->where('end_date', '>', now())
            ->get();

        $now_events = Event::query()
            ->where('start_date', '<=', now())
            ->where('end_date', '>', now())
            ->get();

        return view('frontend.events', compact('eventCountDown', 'now_coming_event', 'upcoming_events', 'now_events'));
    }

    public function event($id)
    {
        $event = Event::query()->where('id', $id)->firstOrFail();
        return view('frontend.show_event', compact('event'));
    }

    public function showIframe(Request $request)
    {
        $event = Event::query()->findOrFail($request->id);
        return view('frontend.show_iframe', compact('event'));
    }
}
