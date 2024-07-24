<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Trait\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    // public function login(LoginUserRequest $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     $request->validated($request->all());

    //     if (!Auth::attempt($credentials)) {
    //         return $this->error('', 'Not match', 401);
    //     }

    //     $user = User::where('email', $request->email)->first();
    //     $token = $request->user()->createToken($request->token_name);

    //     return $this->success([
    //         'user' => $user,
    //         // 'token' => $user->createToken('Api Token of' . $user->name)->plainTextToken
    //         'token' => $token->plainTextToken
    //     ]);
    // }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return [
                'errors' => [
                    'email' => ['The provided credentials are incorrect'],
                ]
            ];
        }
        
        $token = $user->createToken($user->name);

        return ([
            'user' => $user,
            'token' => $token->plainTextToken
        ]);
    }


    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($fields);

        $token = $user->createToken($request->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }

    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();
        return $this->success([
            'message' => 'Logout Success',

        ]);
    }
}
