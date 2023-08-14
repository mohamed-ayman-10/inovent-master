<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Speaker;
use App\Helpers\ManageFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SpeakerController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $event_id = $request->event_id;
        return view('dashboard.pages.speakers.create', compact('event_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name_en' => 'required|min:2',
                'name_ar' => 'required|min:2',
                'job' => 'required|min:3',
                'company_name' => 'required|min:2',
            ]);

            $speaker = new Speaker();
            $speaker->name = [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ];
            $speaker->job = $request->job;
            $speaker->company_name = $request->company_name;
            $speaker->event_id = $request->event_id;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $speaker->image = ManageFile::uploadImage('uploadImage', 'speakers', $file);
            }
            $speaker->save();
            return redirect()->route('dashboard.speakers.show', $request->event_id)->with('message', 'Create Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $speakers = Speaker::query()->where('event_id', $id)->get();
            return view('dashboard.pages.speakers.index', compact('speakers', 'id'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speaker = Speaker::query()->findOrFail($id);
        return view('dashboard.pages.speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name_en' => 'required|min:2',
                'name_ar' => 'required|min:2',
                'job' => 'required|min:3',
                'company_name' => 'required|min:2',
            ]);

            $speaker = Speaker::query()->findOrFail($id);
            $speaker->name = [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ];
            $speaker->job = $request->job;
            $speaker->company_name = $request->company_name;
            $speaker->event_id = $request->event_id;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if (File::exists('images/' . $speaker->image)) {
                    ManageFile::deleteImage('uploadImage', $speaker->image);
                }
                $speaker->image = ManageFile::uploadImage('uploadImage', 'speakers', $file);
            }
            $speaker->save();
            return redirect()->route('dashboard.speakers.show', $request->event_id)->with('message', 'Update Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::query()->findOrFail($id);
        if (File::exists('images/' . $speaker->image)) {
            ManageFile::deleteImage('uploadImage', $speaker->image);
        }

        $speaker->delete();

        return redirect()->back()->with('message', 'Delete Successfully');
    }
}
