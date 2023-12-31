<?php

use App\Models\Faculty;
use App\Models\LeaderShip;
use App\Models\Setting;
use App\Models\StudentsPages;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Models\User;

function getTeachers(){
    $role = Role::where('name', 'teacher')->firstOrFail();
        $teacherUserIds = $role->users()->pluck('id')->toArray();

        $teachers = User::whereIn('id', $teacherUserIds)->orderBy('name');

        return $teachers;

}
if (!function_exists('getSetting')) {
    function getSetting($key){
        $info=session()->get('info');
        if(empty($info)){
            $items=Setting::select('key','value')->pluck('value','key')->toArray();
            session()->put('info', $items);
        }


        $value='';
        if(is_array($info) and array_key_exists($key,$info)){
            $value=$info[$key];
        }

        return $value;
    }
}

// function getImage($folder=null,$file=null){
//     $url = asset("images/nothing.png");
//     $path = public_path('images/'.$folder.'/'.$file);
//     if (!empty($folder) && (!empty($file))) {
//         if(file_exists($path)){
//             $url = asset('images/'.$folder.'/'.$file);
//         }
//     }
//     return $url;
// }



function getImage($folder=null,$file=null){


    $defaultImage = 'images/'. $folder . '/nothing.png';

    if (!empty($folder) && !empty($file)) {
        $path = 'images/' . $folder . '/' . $file;
            return asset(Storage::url($path));
    }

    return asset(Storage::url($defaultImage));
}



function getPdf($folder=null,$file=null){


    // $defaultImage = 'files/'. $folder . '/nothing.png';

    if (!empty($folder) && !empty($file)) {
        $path = 'files/' . $folder . '/' . $file;
            return asset(Storage::url($path));
    }

    // return asset(Storage::url($defaultImage));
}

function deleteImage($folder=null, $file=null){
    if (!empty($folder) && !empty($file)) {
        $imagePath = '/images/'.$folder.'/' . $file;

            Storage::disk('public')->delete($imagePath);
    }
    return true;
}
function deleteFile($folder=null, $file=null){
    if (!empty($folder) && !empty($file)) {
        $imagePath = '/files/'.$folder.'/' . $file;

            Storage::disk('public')->delete($imagePath);
    }
    return true;
}

function createImage($getId=null, $folder=null,$file=null, $request=null, $label=null){
    if($request->hasFile($file)){

        $originName =$request->file($file)->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extention = $request->file($file)->getClientOriginalExtension();
        $fileName =$label.$getId->id.'.'.$extention;

        $request->file($file)->move(public_path($folder), $fileName);
        // $data[$file] = $fileName;
        $getId->$file = $fileName;

        $getId->save();
    }
}
if (!function_exists('uploadImage')) {
    function uploadImage($file, $folder, $disk = 'public')
    {
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs($folder, $filename, $disk);
        return $filename;
    }
}
function updateImage($folder=null,$file=null, $request=null, $label=null, $id=null){
    if($request->hasFile($file)){
        deleteImage($folder, $file);
        $originName =$request->file($file)->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extention = $request->file($file)->getClientOriginalExtension();
        $fileName =$label . $id.'.'.$extention;

        $request->file($file)->move(public_path($folder), $fileName);
        // $data[$file] = $fileName;
        return $fileName;
    }
}

function strLimit($value=null, $limit=null){
   $limit2 = "Input Something";
if(!empty($value) && !empty($limit)){
       $limit2 = \Illuminate\Support\Str::limit($value, $limit, '...');
   }
   return $limit2;
}


function LeaderShips()
{
    $leaderships = LeaderShip::take(4)->get();

    return $leaderships;
}

function getFaculties($num=null){
        $faculties = Faculty::whereRaw('id % 2 = '. $num)->get();

    return $faculties;
}
function getAllFaculties(){
    $faculties = Faculty::take(5)->get();

    return $faculties;
}

function getStudentPage()
{

    $studentPages = StudentsPages::take(6)->get();
    return $studentPages;
}
