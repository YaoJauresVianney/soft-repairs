<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    public $rules =[
        'store' => [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'password' => 'required|min:4',
            'password_confirmed' => 'required|min:4',
        ],
        'update' => [
            'id' => 'required|exists:users,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'password' => 'required|min:4',
            'password_confirmed' => 'required|min:4',
        ],
        'destroy' => [
            'id' => 'required|exists:users,id',
        ]
    ];
    public function all() {
        return User::orderBy('created_at', 'desc')->get();
    }

    public function create(Request $request) {
        //dd($request);
        if($request->password === $request->password_confirmed) {
            return User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'location' => $request->location,
                'role' => $request->role,
                'is_enabled' => $request->is_enabled == 'on' ? 1 : 0,
                'password' => bcrypt($request->password)
            ]);
        }
        return false;
    }

    public function update(Request $request) {
        $user = User::find($request->id);
        if($request->password === $request->password_confirmed) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->location = $request->location;
            $user->role = $request->role;
            $user->is_enabled = $request->is_enabled == 'on' ? 1 : 0;
            $user->password = bcrypt($request->password);
            return $user->save();
        }
        return false;
    }

    public function destroy(Request $request) {
        $user = User::find($request->id);
        return $user->delete();
    }
}
