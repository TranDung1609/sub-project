<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function add_user()
    {
        return view('admin.User.add_user');
    }
    public function list_user()
    {
        $user = User::all();
        return view('admin.User.list_user', ['user' => $user]);
    }
    public function insert(UserRequest $request)
    {
        $data = $request->all();
        $user = new User();
        $data['password'] = Hash::make($request->password);
        $user->fill($data);
        $user->save();
        return Redirect::to('user/list-user');
    }
    public function edit($id)
    {
        $user = User::where('id', $id)->get();
        return view('admin.User.edit_user', ['user' => $user]);
    }
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        User::find($id)->update($data);
        return Redirect::to('user/list-user');
    }
    public function delete(Request $request, $id)
    {
        $data = $request->all();
        User::find($id)->delete($data);
        return Redirect::to('user/list-user');
    }
}
