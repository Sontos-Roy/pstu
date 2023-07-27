<?php

namespace App\Http\Controllers\Backend\Front;

use App\Http\Controllers\Controller;
use App\Models\HistoricalOutline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricalOutlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = HistoricalOutline::orderBy('year', 'DESC')->get();
        return view("backend.About_page.historic.index", $this->data);
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
            'year' => 'required',
            'details' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        HistoricalOutline::create($data);

        return response()->json(['status' => true, 'msg' => 'Outline Created Successfully']);
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
        $data = HistoricalOutline::find($id);

        $html = view('backend.About_page.historic.edit', compact('data'))->render();

        return response()->json(['status'=>true, 'html' => $html]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outline = HistoricalOutline::find($id);
        $data = $request->validate([
            'year' => 'required',
            'details' => 'required',
        ]);
        $data['user_id'] = Auth::id();

        $outline->fill($data);
        $outline->save();


        return response()->json(['status' => true, 'msg' => 'Outline Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outline = HistoricalOutline::find($id);

        $outline->delete();

        return response()->json(['status' => true, 'msg' => 'Outline Deleted Successfully']);
    }

}
