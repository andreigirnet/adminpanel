<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::paginate(2);
      // return response($users, 200)->header('content-type','text/json');
       return view('admin.user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('role_name','id');
        return view('admin.user.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        try {


        $picture_file = $request->file('picture');
        $path = null;

        if($picture_file){
            $path = $picture_file->store('public/user_pictures');
            $path = Str::replace('public/','',$path);
        }
//        dd($path);
//        $user = User::create($request->all());
//        $user->picture = $path;
//        $user->save();

        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'role_id'=>$request->input('role_id'),
            'password'=>Hash::make($request->input('password')),
            'picture'=>$path
        ]);
        }catch(Exception $e ){
            return redirect(route('users.index'))->with('success','Error while creating user');
        }
        return redirect(route('users.index'))->with('success','User has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function edit(User $user)
    {
        $roles = Role::pluck('role_name','id');

        return view('admin.user.edit')->with('roles',$roles)->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(UserRequest $request, User $user)
    {
//        $input = [
//            'user_name'=>$request->user_name,
//            'email'=>$request->email
//        ];
      //  $user->update($input);

        $picture_file = $request->file('picture');
        if($picture_file){
            $path = $picture_file->store('public/user_pictures');
            $path = Str::replace('public/','',$path);
            $user->picture = $path;
        }
        if(!empty($request->input('password'))){
            $user->password = Hash::make($request->input('password'));
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect(route('users.index'))->with('success','User updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

            $user = User::find($id);
            $user->delete();
            return response('ok',200);

    }
}
