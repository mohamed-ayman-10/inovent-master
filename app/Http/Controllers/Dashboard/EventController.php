<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ManageFile;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('dashboard.pages.events.index', compact('events'));
    }

    public function create()
    {
        return view('dashboard.pages.events.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->validate([
                'title_en' => 'required|string|min:2',
                'title_ar' => 'required|string|min:2',
                'venue_en' => 'required|string|min:3',
                'venue_ar' => 'required|string|min:3',
                'description_en' => 'required|string|min:5',
                'description_ar' => 'required|string|min:5',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'link' => 'required|url',
                'image' => 'required|image'
            ]);

            $event = new Event();
            $event->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $event->venue = [
                'en' => $request->venue_en,
                'ar' => $request->venue_ar,
            ];
            $event->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->link = $request->link;
            $image = ManageFile::uploadImage('uploadImage', 'events', $request->file('image'));
            $event->image = $image;
            $event->save();

            // Create New Ticket
            $ticket = new Ticket();
            $ticket->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $ticket->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];
            $ticket->start_sale = date('y-m-d');
            $ticket->end_sale = now();
            $ticket->price = 0;
            $ticket->event_id = $event->id;
            $ticket->save();

            DB::commit();
            return redirect()->route('dashboard.events.index')->with('message', 'Update Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $event = Event::query()->findOrFail($id);
        return view('dashboard.pages.events.edit', compact('event'));
    }

    public function update($id, Request $request)
    {
        try {

            $request->validate([
                'title_en' => 'required|string|min:2',
                'title_ar' => 'required|string|min:2',
                'venue_en' => 'required|string|min:3',
                'venue_ar' => 'required|string|min:3',
                'description_en' => 'required|string|min:5',
                'description_ar' => 'required|string|min:5',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'link' => 'required|url',
            ]);

            $event = Event::query()->findOrFail($id);
            $event->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $event->venue = [
                'en' => $request->venue_en,
                'ar' => $request->venue_ar,
            ];
            $event->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->link = $request->link;
            if ($request->file('image')) {
                ManageFile::deleteImage('uploadImage', $event->image);
                $image = ManageFile::uploadImage('uploadImage', 'events', $request->file('image'));
                $event->image = $image;
            }

            $event->save();

            return redirect()->route('dashboard.events.index')->with('message', 'Create Successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {

            $event = Event::query()->findOrFail($id);
            ManageFile::deleteImage('uploadImage', $event->image);
            $event->delete();
            return back()->with('message', 'Delete Successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
