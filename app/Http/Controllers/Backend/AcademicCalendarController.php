<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicCalendar;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;

class AcademicCalendarController extends Controller
{
    public function index()
    {
        $this->data['items'] = AcademicCalendar::orderBy('id', 'DESC')->get();

        return view('backend.academic_calendars.index', $this->data); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['faculties'] = Faculty::all();
        return view('backend.academic_calendars.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'academic_year' => '',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'class_start' => 'nullable|date',
            'first_mid_term' => 'nullable|date',
            'second_mid_term' => 'nullable|date',
            'class_completion' => 'nullable|date',
            'field_work' => 'nullable|date',
            'final_exam_start' => 'nullable|date',
            'final_exam_end' => 'nullable|date',
        ]);
        $data['created_by'] = Auth::id();


        AcademicCalendar::create($data);

        return response()->json(['status' => true, 'msg' => 'AcademicCalendar Created Successfully', 'url' => route('admin.academic_calendars.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['data'] = AcademicCalendar::find($id);
        $this->data['faculties'] = Faculty::all();

        return view("backend.academic_calendars.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['data'] = AcademicCalendar::find($id);
        $data['faculties'] = Faculty::all();

        return view("backend.academic_calendars.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'academic_year' => '',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'class_start' => 'nullable|date',
            'first_mid_term' => 'nullable|date',
            'second_mid_term' => 'nullable|date',
            'class_completion' => 'nullable|date',
            'field_work' => 'nullable|date',
            'final_exam_start' => 'nullable|date',
            'final_exam_end' => 'nullable|date',
        ]);
        $data['created_by'] = Auth::id();

        $item = AcademicCalendar::find($id);
        $item->update($data);

        return response()->json(['status' => true, 'msg' => 'AcademicCalendar Updated Successfully', 'url' => route('admin.academic_calendars.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = AcademicCalendar::find($id);
        $delete->delete();

        return response()->json(['status' => true, 'msg' => "AcademicCalendar Deleted Successfully"]);
    }


}
