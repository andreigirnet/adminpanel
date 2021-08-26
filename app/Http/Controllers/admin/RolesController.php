<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\Models\User::pluck('name','id');
        $permissions = Permission::pluck('Permission_name','id');
        return view('admin.roles.create')->with('users', $users)->with('permissions',$permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       $roles = Role::create($request->all());
       $permission_ids = $request->input('permission_id');
       $roles->permissions()->attach($permission_ids);

        return redirect(route('roles.index'))->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Role $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $roles
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $users = \App\Models\User::pluck('name','id');
        $permissions = Permission::pluck('Permission_name','id');
        $selected_permissions = $role->permission()->pluck('id');
        return view('admin.roles.edit')->with('users',$users)->with('permissions',$permissions)->with('role',$role)->with('selected_permissions',$selected_permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $roles
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Role $role)
    {
        $input = [
            'role_name'=> $request->role_name,
            'permission_id'=> $request->permission_id

        ];
        $role->update($input);
        return redirect(route('roles.index'))->with('success','The role was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $roles
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('roles.index'))->with('success','Role deleted');
    }
}
