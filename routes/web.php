<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SetupController;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/setup', function () {
    $credentials = [
        'email' => 'admin@gmail.com',
        'password' => 'password',
    ];
    if (!Auth::attempt($credentials)) {
        $user = new User;

        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('password');

        $user->save();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);

            $basicToken = $user->createToken('basic-token');

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'basic' => $basicToken->plainTextToken,
            ];
        }
    }
});*/

Route::get('/setup', [SetupController::class, 'setup']);