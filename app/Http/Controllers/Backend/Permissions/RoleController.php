<?php

namespace App\Http\Controllers\Backend\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('backend.permissions.role',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();
        return view('backend.permissions.roleadd',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return response()->json(['status'=>true, 'msg'=>'Role Created Successfully', 'url'=> route('admin.roles.index')]);
        // return redirect()->route('admin.roles.index')->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('backend.permissions.roleshow',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permissions =Permission::orderBy('name')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('backend.permissions.roleedit',compact('role','permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return response()->json(['status'=>true, 'msg'=>'Role Updated Successfully', 'url'=> route('admin.roles.index')]);
        // return redirect()->route('roles.index')->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return response()->json(['status'=>true, 'msg'=>'Role Deleted Successfully', 'url'=> route('admin.roles.index')]);
        // return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }

    public function allPermissions(){
        $query = Permission::orderBy('name');
        $search=request('q');
                if($search){
                    $query->where('name','Like','%'.$search.'%');
                }
        $this->data['permissions'] = $query->get();
        return view('backend.permissions.permissions', $this->data);
    }
    public function addPermissions(){
        return view('backend.permissions.add');
    }
    public function storePermission(Request $request){
        $data = $request->validate([
            'name'=> 'required|unique:permissions,name'
        ]);
        Permission::create($data);

        return response()->json(['status'=>true, 'msg'=> 'Permission Has Created', 'url'=>route('admin.permissions.add')]);
        // return redirect()->route('admin.permissions.index')->with('success', 'Permission Created Successfully');

    }
    public function editPermission($id){
        $this->data['permission'] = Permission::find($id);

        return view('backend.permissions.edit', $this->data);
    }

    public function updatePermission(Request $request, $id){
        $data = $request->validate([
            'name'=>'required'
        ]);

        Permission::find($id)->update($data);

        return response()->json(['status'=>true, 'msg'=> 'Permission Has Updated', 'url'=>route('admin.permissions.index')]);

    }
    public function deletePermission($id){

        Permission::find($id)->delete();

        return response()->json(['status'=>true, 'msg'=> 'Permission Has Deleted', 'url'=>route('admin.permissions.index')]);
    }

}
