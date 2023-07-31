<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use App\Models\UserDetail;
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
    public function index()
    {
        // $this->data['teachers'] = User::join('user_details', 'users.id', '=', 'user_details.user_id')
        // ->orderBy('users.name', 'ASC')
        // ->get();;
        $role = Role::where('name', 'Dean')->firstOrFail();
        $teacherUserIds = $role->users()->pluck('id')->toArray();

        $this->data['teachers'] = User::whereIn('id', $teacherUserIds)->orderBy('name')->paginate(6 );

        return view('backend.teachers.teachers', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['roles'] = Role::pluck('name','name')->all();
        $this->data['departments'] = Department::all();
        return view('backend.teachers.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'date_of_birth' => '',
            'gender' => 'required',
            'department_id' => 'required',
            'position' => 'required',
            'image' => 'image',
            'banner' => 'image',
            'present_address' => '',
            'permanent_address' => '',
            'phone' => '',
            'website' => '',
            'facebook' => '',
            'youtube' => '',
            'twitter' => '',
            'linkedin' => '',
            'google_plus' => '',
            'email' => 'email|required',
            'password' => 'required|min:8',
            'roles' => 'required'
        ]);
        $teacher = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $teacher->assignRole($request->input('roles'));


        $details = new UserDetail();
        $details->user_id = $teacher->id;
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



        return response()->json(['status'=>true, 'msg'=>'User Created Successfuly', 'url'=>route('admin.users.index')]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['teacher'] = User::find($id);

        return view('backend.teachers.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $departments = Department::all();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('backend.teachers.edit',compact('user','roles','userRole', 'departments'));
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
            'department_id' => 'required',
            'position' => 'required',
            'image' => 'image',
            'banner' => 'image',
            'present_address' => '',
            'permanent_address' => '',
            'phone' => '',
            'website' => '',
            'facebook' => '',
            'youtube' => '',
            'twitter' => '',
            'linkedin' => '',
            'google_plus' => '',
            'email' => 'email|required',
            'roles' => 'required'
        ]);
        $teacher = User::find($id);
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        // if ($request->input('password')) {
        //     $teacher->password = bcrypt($request->input('password'));
        // }
        $teacher->save();
        // if(!empty($input['password'])){
        //     $$teacher->password = bcrypt($input['password']);
        // }else{
        //     $input = Arr::except($input,array('password'));
        // }

        if(isset($teacher->userDetails)){
            $details = $teacher->userDetails;
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


        if(Auth::id() == $teacher->id){
            return response()->json(['status'=>true, 'msg'=>'User Updated Successfully', 'url'=>route('admin.users.show', Auth::id())]);
        }else{
            return response()->json(['status'=>true, 'msg'=>'User Updated Successfully', 'url'=>route('admin.users.index')]);
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
