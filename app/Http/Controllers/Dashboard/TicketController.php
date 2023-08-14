<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index($event_id)
    {
        $tickets = Ticket::query()->where('event_id', $event_id)->get();
        $event = Event::query()->findOrFail($event_id);
        return view('dashboard.pages.tickets.index', compact('tickets', 'event'));
    }

    public function create($event_id)
    {
        return view('dashboard.pages.tickets.create', compact('event_id'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'title_en' => 'required|string|min:2',
                'title_ar' => 'required|string|min:2',
                'description_en' => 'required|string',
                'start_sale' => 'required|date',
                'end_sale' => 'required|date',
                'price' => 'required',
                'event_id' => 'required',
            ]);

            $ticket = new Ticket();
            $ticket->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $ticket->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];
            $ticket->start_sale = $request->start_sale;
            $ticket->end_sale = $request->end_sale;
            $ticket->price = $request->price;
            $ticket->event_id = $request->event_id;
            $ticket->save();

            return redirect()->route('dashboard.tickets.index', $request->event_id)->with('message', 'Create Successfully!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id) {
        $ticket = Ticket::query()->findOrFail($id);
        return view('dashboard.pages.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'title_en' => 'required|string|min:2',
                'title_ar' => 'required|string|min:2',
                'description_en' => 'required|string',
                'start_sale' => 'required|date',
                'end_sale' => 'required|date',
                'price' => 'required',
            ]);

            $ticket = Ticket::query()->findOrFail($id);
            $ticket->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $ticket->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];
            $ticket->start_sale = $request->start_sale;
            $ticket->end_sale = $request->end_sale;
            $ticket->price = $request->price;
            $ticket->save();

            return redirect()->route('dashboard.tickets.index', $request->event_id)->with('message', 'Update Successfully!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {

            Ticket::destroy($id);
            return back()->with('message', 'Delete Successfully!');

        }catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
