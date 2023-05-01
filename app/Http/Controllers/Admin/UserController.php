<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        // using the map collection method
        // $users = User::latest()->get()->map(function ($user) {
        //     return [
        //         'id' => $user->id,
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         // 'created_at' => $user->created_at->format('Y-m-d'), 
        //         // if done as above and you need to change the date format you need to go to every page that contains date and change the format
        //         // so the better method is to use the config. go to app.php (config) then define a time_format
        //         // 'created_at' => $user->created_at->format(config('app.date_format'))
                
        //         // can also be done using laravel macro
        //         // dd($user->created_at->toFromattedDate());
        //         'created_at' => $user->created_at->toFromattedDate()
        //     ];
        // });

        // using accessor (managed through model)
        $users = User::latest()->get();

        return $users;
    }

    public function store(){
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        return User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
    }

    public function update(User $user){
        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:8',
        ]);

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password') ? bcrypt(request('password')) : $user->password,
        ]);

        return $user;
    }

    public function destroy(User $user){
        $user->delete();
        
        return response()->noContent();
    }
}
