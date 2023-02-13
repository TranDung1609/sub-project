<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct()
    {
        Auth::setDefaultDriver('api');
    }
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ],Response::HTTP_OK);
    }
    public function register(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ],Response::HTTP_OK);
    }
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ],
        Response::HTTP_OK);
    }
    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorization' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ], Response::HTTP_OK);
    }
    public function getUserInfo()
    {
        $user = Auth::user();
        Auth::user()->profile;
        return response()->json([
            'user' => $user,
        ],Response::HTTP_OK);
    }
    public function editProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        // if ($request->hasFile('image')) {
        //     $uploadPath = 'avatars';
        //     $file = $request->file('image');
        //     $extention = $file->getClientOriginalExtension();
        //     $nameImage = current(explode('.', $file->getClientOriginalName()));
        //     $filename = time() . $nameImage . '.' . $extention;
        //     $file->move($uploadPath, $filename);
        // }
        $user->profile()->updateOrCreate(
            ['user_id' => $request->user()->id],
            [
                'phone' => $request->phone,
                'age' => $request->age,
                'gender' => $request->gender,
                'address' => $request->address,
                // 'avatar' => $filename,
                'avatar' => 'abc.jpg'
            ]
        );
        $profile = User::find(Auth::user()->id)->profile;
        $user['profile'] = $profile;
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully edit profile',
            'user' => $user
        ],Response::HTTP_OK);
    }
}
