<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noc;
use App\Models\User;
use DB;
class NocController extends Controller
{
    public function index()
    {
        $this->data['items'] = Noc::paginate(30);
        return view("backend.noces.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        return view("backend.noces.create", compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'type' => 'required',
            'date' => '',
        ]);
    
        $data['created_by'] = \Auth::id();
        DB::beginTransaction();

        try {

            if ($request->hasFile('pdf_file')) {
                $image = $request->file('pdf_file');
                $filename = time().'_'.$image->getClientOriginalName();
                $image->storeAs('public/files/noces', $filename);
                $data['pdf_file'] = $filename;
            }

            Noc::create($data);
            DB::commit();
            return response()->json(['status' => true, 'msg' => 'Noc Created Successfully','url'=>route('admin.noces.index')]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'msg' => $e->getMessage()]);
        }


    }


    public function edit(string $id){

        $item = Noc::find($id);
        $users=User::all();
        return view('backend.noces.edit', compact('item','users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=Noc::find($id);
        $data = $request->validate([
            'user_id' => 'required',
            'type' => 'required',
            'date' => '',
        ]);
    

        DB::beginTransaction();

        try {

            if ($request->hasFile('pdf_file')) {
                deleteFile('noces', $item->pdf_file);
                $image = $request->file('pdf_file');
                $filename = time().'_'.$image->getClientOriginalName();
                $image->storeAs('public/files/noces', $filename);
                $data['pdf_file'] = $filename;
            }

            $item->update($data);
            DB::commit();
            return response()->json(['status' => true, 'msg' => 'Noc Updated Successfully','url'=>route('admin.noces.index')]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'msg' => $e->getMessage()]);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Noc::find($id);
        deleteFile('noces', $item->pdf_file);
        $item->delete();

        return response()->json(['status' => true, 'msg' => 'Noc Deleted Successfully']);
    }

}
