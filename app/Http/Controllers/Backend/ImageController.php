<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Image;
use App\Models\Institutes;
use App\Models\Program;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $query= Image::query();
                if(auth()->user()->hasRole('faculty')){
                    $query->whereIn('faculty_id', auth()->user()->faculties()->pluck('id'));
                }
        $this->data['images'] =$query->paginate(10);


        $this->data['faculties'] = getFaculty();
        $this->data['departments'] = Department::all();
        $this->data['programs'] = Program::all();
        $this->data['institutes'] = Institutes::all();
        return view("backend.Images.index", $this->data);
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
            'faculty_id' => '',
            'institute_id' => '',
            'program_id' => '',
            'department_id' => '',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|required',
        ]);
        unset($data['images']);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time().'_'.$image->getClientOriginalName();
                $image->storeAs('public/images/images', $filename);
                $data['image'] = $filename;
                Image::create($data);
            }
        }
        return response()->json(['status' => true, 'msg' => 'Image Created Successfully']);
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Image::find($id);

        if($slider->image){
            deleteImage('images', $slider->image);
        }

        $slider->delete();

        return response()->json(['status' => true, 'msg' => 'Image Deleted Successfully']);
    }
}
