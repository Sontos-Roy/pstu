<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FinanceCommittee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['members'] = FinanceCommittee::all();

        return view('backend.committees.finance_committee.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.committees.finance_committee.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => '',
            'address' => 'required',
        ]);

        $data['user_id'] = Auth::id();

        FinanceCommittee::create($data);

        return response()->json(['status' => true, 'msg' => 'Finance Committee Member Created Successfully', 'url' => route('admin.finance_committee.index')]);
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
        $this->data['item'] = FinanceCommittee::find($id);

        return view('backend.committees.finance_committee.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => '',
            'address' => 'required',
        ]);

        $data['user_id'] = Auth::id();
        FinanceCommittee::find($id)->update($data);

        return response()->json(['status' => true, 'msg' => 'Finance Committee Member Updated Successfully', 'url' => route('admin.finance_committee.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FinanceCommittee::find($id)->delete();

        return response()->json(['status' => true, 'msg' => 'Finance Committee Member Deleted Successfully']);

    }
}
