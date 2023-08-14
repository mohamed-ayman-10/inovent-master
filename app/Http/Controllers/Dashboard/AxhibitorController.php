<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exhibitor;
use App\Helpers\ManageFile;
use Illuminate\Support\Facades\File;

class AxhibitorController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $event_id = $request->event_id;
        return view('dashboard.pages.exhibitors.create', compact('event_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate(['title_en' => 'required|min:2',
                'title_ar' => 'required|min:2',
                'sponsor' => 'required|min:3',
                'grade' => 'required|min:2',



        ]);
            $exhibitor = new exhibitor();
            $exhibitor->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $exhibitor->sponsor = $request->sponsor;
            $exhibitor->grade = $request->grade;
            $exhibitor->event_id = $request->event_id;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $exhibitor->image = ManageFile::uploadImage('uploadImage', 'exhibitors', $file);
            }
            $exhibitor->save();
            return redirect()->route('dashboard.exhibitor.show', $request->event_id)->with('message', 'Create Successfully');

        }
        catch(\Exception $e){
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

            $exhibitors = exhibitor::query()->where('event_id', $id)->get();
            return view('dashboard.pages.exhibitors.index', compact('exhibitors', 'id'));
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
         $exhibitor = exhibitor::query()->findOrFail($id);
        return view('dashboard.pages.exhibitors.edit', compact('exhibitor'));
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
                'title_ar' => 'required|min:2',
                'title_en' => 'required|min:2',
                'sponsor' => 'required|min:3',
                'grade' => 'required|min:2',
            ]);

            $exhibitor = exhibitor::query()->findOrFail($id);
            // $exhibitor = new exhibitor();
            $exhibitor->title = [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ];
            $exhibitor->sponsor = $request->sponsor;
            $exhibitor->grade = $request->grade;
            $exhibitor->event_id = $request->event_id;
            // return $exhibitor->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($exhibitor->image) {
                    ManageFile::deleteImage('uploadImage', $exhibitor->image);
                }
                $exhibitor->image = ManageFile::uploadImage('uploadImage', 'exhibitors', $file);
            }
            $exhibitor->save();
            return redirect()->route('dashboard.exhibitor.show', $request->event_id)->with('message', 'Update Successfully');
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
        $exhibitor = exhibitor::query()->findOrFail($id);
        if ($exhibitor->image) {
            ManageFile::deleteImage('uploadImage', $exhibitor->image);
        }

        $exhibitor->delete();

        return redirect()->back()->with('message', 'Delete Successfully');
    }

}
