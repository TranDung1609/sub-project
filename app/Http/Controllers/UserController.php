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
        // $user = User::paginate(9);
        return view('admin.User.list_user', ['user' => $user]);
    }

    public function insert(UserRequest $request)
    {
        try {
            $data = $request->all();
            $user = new User();
            $data['password'] = Hash::make($request->password);
            $user->fill($data);
            $user->save();

            return Redirect::to('user/list-user');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $user = User::where('id', $id)->get();

            return view('admin.User.edit_user', ['user' => $user]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update(UserRequest $request, $id)
    {
        try {
            $data = $request->all();
            User::find($id)->update($data);

            return Redirect::to('user/list-user');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    // public function update(Request $request, $id){
    //     $user = User::where('id', $id)->get();
    //     $data = $request->all();
    //     $user->name = $data['name'];
    //     $user->email = $data['email'];
    //     $user->password = bcrypt($data['password']);
    //     $user->role = $data['role'];
    //     $user->save();

    //     return Redirect::to('list-user');
    // }
    public function delete(Request $request, $id)
    {
        try {
        $data = $request->all();
        User::find($id)->delete($data);

        return Redirect::to('user/list-user');
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    }
}
