<?php

namespace App\Http\Controllers\Backend\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['sliders'] = Slider::all();
        return view("backend.homeSlider.index", $this->data);
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
            'head' => 'required',
            'first_btn' => '',
            'second_btn' => '',
            'first_btn_link' => '',
            'second_btn_link' => '',
            'isActive' => '',
            'image' => 'image|required',
        ]);

        $isChecked = $request->has('isActive');

        if($isChecked){
            $data['isActive'] = 1;
        }else{
            $data['isActive'] = 0;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/sliders', $filename);
            $data['image'] = $filename;
        }

        Slider::create($data);

        return response()->json(['status' => true, 'msg' => 'Slider Created Successfully']);
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
        $data = Slider::find($id);

        $html = view('backend.homeSlider.edit', compact('data'))->render();

        return response()->json(['status'=>true, 'html' => $html]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'head' => 'required',
            'first_btn' => '',
            'second_btn' => '',
            'first_btn_link' => '',
            'second_btn_link' => '',
            'isActive' => '',
            'image' => 'image',
        ]);
        $slider = Slider::find($id);

        $isChecked = $request->has('isActive');

        if($isChecked){
            $data['isActive'] = 1;
        }else{
            $data['isActive'] = 0;
        }

        if ($request->hasFile('image')) {
            if ($slider->image) {
                $imagePath = '/images/sliders/' . $slider->image;
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/sliders', $filename);
            $data['image'] = $filename;
        }
        $slider->fill($data);
        $slider->save();


        return response()->json(['status' => true, 'msg' => 'Slider Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);

        if($slider->image){
            $imagePath = '/images/sliders/' . $slider->image;

            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $slider->delete();

        return response()->json(['status' => true, 'msg' => 'Slider Deleted Successfully']);
    }
    public function changeStatus(Request $request, $id){
        $data = Slider::find($id);

        if($data->isActive == 0){
            $data->isActive = 1;
        }else if($data->isActive == 1){
            $data->isActive = 0;
        }

        $data->save();

        return response()->json(['msg'=>"Active Status Changed"]);
    }
}
