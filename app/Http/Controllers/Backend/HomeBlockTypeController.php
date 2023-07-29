<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeBlockType;
use App\Models\HomeBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class HomeBlockTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['types'] = HomeBlockType::all();
        return view("backend.block_types.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.block_types.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'image|required',
        ]);
        $data['slug'] = Str::slug($data['name']);

    DB::beginTransaction();

    try {

        if($request->hasFile('images')){

            $allowedfileExtension=['jpg','png','jpeg'];
            $files = $request->file('images');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check==false){
                    
                }
            }
        }


        if($request->hasFile('pdf_files')){

            $allowedfileExtension=['pdf'];
            $files = $request->file('pdf_files');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check==false){
                    
                }
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/home_blocks', $filename);
            $data['image'] = $filename;
        }


        $item=HomeBlockType::create($data);

        
        $titles=$request->titles;
        $images=$request->images ??[];
        $pdf_files=$request->pdf_files ??[];

        if(isset($titles)){
            $details_data=[];
            foreach ($titles as $key => $title) {

                $filename='';
                if(array_key_exists($key,$images)){
                    $image=$images[$key];
                    if($image){
                        $filename = time().'_'.$image->getClientOriginalName();
                        $image->storeAs('public/images/home_block_details', $filename);

                    }
                }

                $pdf_file_name='';
                if(array_key_exists($key,$pdf_files)){
                    $pdf_file=$pdf_files[$key];
                    
                    if($pdf_file){
                        $pdf_file_name = time().'_'.$pdf_file->getClientOriginalName();
                        $pdf_file->storeAs('public/files/home_block_details', $pdf_file_name);

                    }
                }

                $details_data[]=[
                    'name'=>$title,
                    'slug'=>Str::slug($title),
                    'published_date'=> $request->dates[$key],
                    'image'=> $filename,
                    'file'=> $pdf_file_name,

                ];
            }
        }

        if (!empty($details_data)) {
            $item->details()->createMany($details_data);
        }

        DB::commit();
        return response()->json(['status' => true, 'msg' => 'Home Block Created Successfully','url'=>route('admin.home_block_types.index')]);

    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['status' => false, 'msg' => $e->getMessage()]);
    }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){

        $item = HomeBlockType::find($id);
        return view('backend.block_types.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){

        $item = HomeBlockType::find($id);
        return view('backend.block_types.edit', compact('item'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=HomeBlockType::find($id);
        $data = $request->validate([
            'name' => 'required',
        ]);
        $data['slug'] = Str::slug($data['name']);

        DB::beginTransaction();

    try {


        if ($request->hasFile('image')) {

            deleteFile('home_blocks', $item->image);

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/home_blocks', $filename);
            $data['image'] = $filename;
        }

        $item->update($data);

        $titles=$request->titles;
        $details_id=$request->details_id;
        $images=$request->images ??[];
        $pdf_files=$request->pdf_files ??[];


        if(isset($titles)){
            $details_data=[];
            foreach ($titles as $key => $title) {

                if (array_key_exists($key,$details_id) && $details_id[$key]) {

                    $home_block=HomeBlock::find($details_id[$key]);

                    $existing_data=[
                        'name'=>$title,
                        'slug'=>Str::slug($title),
                        'published_date'=> $request->dates[$key],

                    ];

                    if(array_key_exists($key,$images)){
                        deleteImage('home_block_details',$home_block->image);
                        $image=$images[$key];
                        $filename='';
                        if($image){
                            $filename = time().'_'.$image->getClientOriginalName();
                            $image->storeAs('public/images/home_block_details', $filename);
                            $existing_data['image']=$filename;
                        }
                    }
                    
                    if(array_key_exists($key,$pdf_files)){
                        deleteFile('home_block_details',$home_block->file);
                        $pdf_file=$pdf_files[$key];
                        $pdf_file_name='';
                        if($pdf_file){
                            $pdf_file_name = time().'_'.$pdf_file->getClientOriginalName();
                            $pdf_file->storeAs('public/files/home_block_details', $pdf_file_name);
                            $existing_data['file']=$pdf_file_name;
                        }
                    }


                    $home_block->update($existing_data);
                    # code...
                }else{
                    $filename='';
                    if(array_key_exists($key,$images)){
                        $image=$images[$key];
                        if($image){
                            $filename = time().'_'.$image->getClientOriginalName();
                            $image->storeAs('public/images/home_block_details', $filename);

                        }
                    }

                    $pdf_file_name='';
                    if(array_key_exists($key,$pdf_files)){
                        $pdf_file=$pdf_files[$key];
                        
                        if($pdf_file){
                            $pdf_file_name = time().'_'.$pdf_file->getClientOriginalName();
                            $pdf_file->storeAs('public/files/home_block_details', $pdf_file_name);

                        }
                    }


                    $details_data[]=[
                        'name'=>$title,
                        'slug'=>Str::slug($title),
                        'published_date'=> $request->dates[$key],
                        'image'=> $filename,
                        'file'=> $pdf_file_name,

                    ];

                }

                
            }
        }

        $delete_items=$item->details()->whereNotIn('id',$details_id)->get();

        foreach ($delete_items as $key => $delete_item) {
                deleteImage('home_block_details', $delete_item->image);
                deleteFile('home_block_details', $delete_item->file);
                $delete_item->delete();
        }

        if (!empty($details_data)) {
            $item->details()->createMany($details_data);
        }

        DB::commit();
        return response()->json(['status' => true, 'msg' => 'Home Block Updated Successfully','url'=>route('admin.home_block_types.index')]);

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
        $item = HomeBlockType::find($id);

        if($item->image){
            deleteFile('home_blocks', $item->image);
        }

        $item->details()->delete();
        $item->delete();

        return response()->json(['status' => true, 'msg' => 'Home Block Deleted Successfully']);
    }

}
