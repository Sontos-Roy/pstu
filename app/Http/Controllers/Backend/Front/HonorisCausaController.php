<?php

namespace App\Http\Controllers\Backend\Front;

use App\Http\Controllers\Controller;
use App\Models\HonorisCausa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HonorisCausaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = HonorisCausa::all();
        return view("backend.About_page.honoric-causas.index", $this->data);
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
            'name' => 'required',
            'award' => 'required',
            'year' => 'required',
        ]);
        $data['user_id'] = Auth::id();
        HonorisCausa::create($data);

        return response()->json(['status' => true, 'msg' => 'Honoris Causas Created Successfully']);
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
        $data = HonorisCausa::find($id);

        $html = view('backend.About_page.honoric-causas.edit', compact('data'))->render();

        return response()->json(['status'=>true, 'html' => $html]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outline = HonorisCausa::find($id);
        $data = $request->validate([
            'name' => 'required',
            'award' => 'required',
            'year' => 'required',
        ]);
        $data['user_id'] = Auth::id();

        $outline->fill($data);
        $outline->save();


        return response()->json(['status' => true, 'msg' => 'Honoris Causas Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outline = HonorisCausa::find($id);

        $outline->delete();

        return response()->json(['status' => true, 'msg' => 'Honoris Causas Deleted Successfully']);
    }
}
