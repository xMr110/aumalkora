<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create-edit');
    }
    public function edit(User $user)
    {
        return view('admin.users.create-edit',compact('user'));
    }
    public function store(UserRequest $request)
    {
        $this->validate($request,['password'=>'required|confirmed']);
        $user = new User($request->except('password'));
        $user->password = bcrypt($request->password);
        $user->role = 1;
        $user->save();
        return redirect(action('Admin\UserController@index'))->with('success','User Added!');

    }
    public function update(UserRequest $request,User $user)
    {
        $user->update($request->except('password'));
        if ($request->has(['password'])) {
            $this->validate($request, ['password' => 'confirmed']);

            $user->update(['password' => bcrypt($request->get('password'))]);
            }
            $user->save();
        return back()->with('success','User Info Updated!');
    }
    public function destroy($id)
    {
        if (count(User::all()) <= 2)
        {
            return back()->with('warning','Can Not Delete This User Now');
        }
        User::destroy($id);

        return redirect(action('Admin\UserController@index'))->with('success', 'User Deleted!');

    }
}
