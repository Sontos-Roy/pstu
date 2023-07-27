<?php

namespace App\Http\Controllers\Backend\Front;

use App\Http\Controllers\Controller;
use App\Models\UniversityOrdinance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniversityOrdinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = UniversityOrdinance::all();
        return view("backend.About_page.university_ordinance.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ]);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files/university-ordinances', $filename);
            $data['file'] = $filename;
        }

        UniversityOrdinance::create($data);
        return response()->json(['status' => true, 'msg' => 'University Ordinance Created Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = UniversityOrdinance::find($id);

        $html = view('backend.About_page.university_ordinance.edit', compact('data'))->render();

        return response()->json(['status'=>true, 'html' => $html]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outline = UniversityOrdinance::find($id);
        $data = $request->validate([
            'title' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ]);
        $data['user_id'] = Auth::id();


        if ($request->hasFile('file')) {
            if($outline->file){
                deleteFile('university-ordinances', $outline->file);
            }

            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files/university-ordinances', $filename);
            $data['file'] = $filename;
        }

        $outline->fill($data);
        $outline->save();


        return response()->json(['status' => true, 'msg' => 'University Ordinance Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outline = UniversityOrdinance::find($id);
        if($outline->file){
            deleteFile('university-ordinances', $outline->file);
        }
        $outline->delete();

        return response()->json(['status' => true, 'msg' => 'University Ordinance Deleted Successfully']);
    }
}
