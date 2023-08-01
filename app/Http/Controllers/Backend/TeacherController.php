<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Designation;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $this->data['teachers'] = User::orderBy('name')->paginate(20);
        return view('backend.teachers.teachers', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['roles'] = Role::pluck('name','name')->all();
        $this->data['departments'] = Department::all();
        $this->data['faculties'] = Faculty::all();
        $this->data['designations'] = Designation::all();
        return view('backend.teachers.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){


       $request->validate([
            'name' => 'required',
            'date_of_birth' => '',
            'gender' => 'required',
            'department_id' => '',
            'faculty_id' => '',
            'position' => 'required',
            'image' => 'image',
            'banner' => 'image',
            'present_address' => '',
            'permanent_address' => '',
            'phone' => 'required',
            'website' => '',
            'facebook' => '',
            'youtube' => '',
            'twitter' => '',
            'linkedin' => '',
            'google_plus' => '',
            'email' => 'email|required',
            'password' => 'required|min:6',
            'roles' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $teacher = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'department_id' => $request->input('department_id'),
                'faculty_id' => $request->input('faculty_id'),
                'designation_id' => $request->input('designation_id'),
                'password' => bcrypt($request->input('password')),
            ]);

            $teacher->assignRole($request->input('roles'));


            $details = new UserDetail();
            $details->user_id = $teacher->id;
            $details->date_of_birth = $request->input('date_of_birth');
            $details->gender = $request->input('gender');
            $details->position = $request->input('position');
            $details->present_address = $request->input('present_address');
            $details->permanent_address = $request->input('permanent_address');
            $details->phone = $request->input('phone');
            $details->website = $request->input('website');
            $details->facebook = $request->input('facebook');
            $details->youtube = $request->input('youtube');
            $details->twitter = $request->input('twitter');
            $details->linkedin = $request->input('linkedin');
            $details->google_plus = $request->input('google_plus');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time().'_'.$image->getClientOriginalName();
                $image->storeAs('public/images/teachers', $filename);
                $details->image = $filename;
            }
            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $filename2 = time().'_banner_'.$banner->getClientOriginalName();
                $banner->storeAs('public/images/teachers', $filename2);
                $details->banner = $filename2;
            }

            $teacher->userDetails()->save($details);
            DB::commit();
            return response()->json(['status'=>true, 'msg'=>'User Created Successfuly', 'url'=>route('admin.users.index')]);

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false, 'msg'=>$e->getMessage()]);
        }

        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['teacher'] = User::find($id);

        return view('backend.teachers.view', $this->data);
    }


    public function userProfile(string $id)
    {
        $this->data['teacher'] = User::find($id);

        return view('backend.teachers.profile', $this->data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $departments = Department::all();
        $faculties= Faculty::all();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $designations = Designation::all();
        return view('backend.teachers.edit',compact('user','roles','userRole', 'departments', 'faculties','designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => '',
            'gender' => 'required',
            'department_id' => '',
            'faculty_id' => '',
            'designation_id' => '',
            'position' => 'required',
            'image' => 'image',
            'banner' => 'image',
            'present_address' => '',
            'permanent_address' => '',
            'phone' => 'required',
            'website' => '',
            'facebook' => '',
            'youtube' => '',
            'twitter' => '',
            'linkedin' => '',
            'google_plus' => '',
            'email' => 'email|required',
            'roles' => 'required'
        ]);


    DB::beginTransaction();

        try {

            $teacher = User::find($id);
            $teacher->name = $request->input('name');
            $teacher->email = $request->input('email');
            $teacher->department_id = $request->input('department_id');
            $teacher->faculty_id = $request->input('faculty_id');
            $teacher->designation_id = $request->input('designation_id');
   
            $teacher->save();
   

            if(isset($teacher->userDetails)){
                $details = $teacher->userDetails;
                $details->date_of_birth = $request->input('date_of_birth');
                $details->gender = $request->input('gender');
                $details->position = $request->input('position');
                $details->present_address = $request->input('present_address');
                $details->permanent_address = $request->input('permanent_address');
                $details->phone = $request->input('phone');
                $details->website = $request->input('website');
                $details->facebook = $request->input('facebook');
                $details->youtube = $request->input('youtube');
                $details->twitter = $request->input('twitter');
                $details->linkedin = $request->input('linkedin');
                $details->google_plus = $request->input('google_plus');
                DB::table('model_has_roles')->where('model_id',$id)->delete();

                $teacher->assignRole($request->input('roles'));


                if ($request->hasFile('image')) {
                    if ($teacher && $teacher->userDetails && $teacher->userDetails->image) {
                        $imagePath = '/images/teachers/' . $teacher->userDetails->image;

                        if (Storage::disk('public')->exists($imagePath)) {
                            Storage::disk('public')->delete($imagePath);
                        }
                    }
                    $image = $request->file('image');
                    $filename = time().'_'.$image->getClientOriginalName();
                    $image->storeAs('public/images/teachers', $filename);
                    $details->image = $filename;
                }
                if ($request->hasFile('banner')) {
                    if ($teacher && $teacher->userDetails && $teacher->userDetails->image) {
                        $imagePath = '/images/teachers/' . $teacher->userDetails->image;

                        if (Storage::disk('public')->exists($imagePath)) {
                            Storage::disk('public')->delete($imagePath);
                        }
                    }
                    $banner = $request->file('banner');
                    $filename2 = time().'_banner_'.$banner->getClientOriginalName();
                    $banner->storeAs('public/images/teachers', $filename2);
                    $details->banner = $filename2;
                }

                $teacher->userDetails()->save($details);
            }else{
                $details = new UserDetail();
                $details->user_id = $id;
                $details->date_of_birth = $request->input('date_of_birth');
                $details->gender = $request->input('gender');
                $details->department_id = $request->input('department_id');
                $details->position = $request->input('position');
                $details->present_address = $request->input('present_address');
                $details->permanent_address = $request->input('permanent_address');
                $details->phone = $request->input('phone');
                $details->website = $request->input('website');
                $details->facebook = $request->input('facebook');
                $details->youtube = $request->input('youtube');
                $details->twitter = $request->input('twitter');
                $details->linkedin = $request->input('linkedin');
                $details->google_plus = $request->input('google_plus');

                $teacher->assignRole($request->input('roles'));
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $filename = time().'_'.$image->getClientOriginalName();
                    $image->storeAs('public/images/teachers', $filename);
                    $details->image = $filename;
                }
                if ($request->hasFile('banner')) {

                    $banner = $request->file('banner');
                    $filename2 = time().'_banner_'.$banner->getClientOriginalName();
                    $banner->storeAs('public/images/teachers', $filename2);
                    $details->banner = $filename2;
                }

                $teacher->userDetails()->save($details);

            }

            DB::commit();
            if(Auth::id() == $teacher->id){
                return response()->json(['status'=>true, 'msg'=>'User Updated Successfully', 'url'=>route('admin.users.show', Auth::id())]);
            }else{
                return response()->json(['status'=>true, 'msg'=>'User Updated Successfully', 'url'=>route('admin.users.index')]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false, 'msg'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user && $user->userDetails && $user->userDetails->image) {
            $imagePath = '/images/teachers/' . $user->userDetails->image;

                Storage::disk('public')->delete($imagePath);
        }
        if ($user && $user->userDetails && $user->userDetails->banner) {
            $imagePath2 = '/images/teachers/' . $user->userDetails->banner;

                Storage::disk('public')->delete($imagePath2);
        }
        if($user && $user->userDetails){
            $user->userDetails->delete();
        }
        $user->delete();


        return response()->json(['status'=>true, 'msg'=>'Teachers Deleted Successfuly', 'url'=>route('admin.users.index')]);
    }
}
