<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SetupController extends Controller
{
    const ADMIN_EMAIL = 'admin@gmail.com';
    const ADMIN_PASSWORD = 'password';

    public function setup()
    {
        // Check if the user already exists
        $user = User::where('email', self::ADMIN_EMAIL)->first();

        // Create the user if it does not exist
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => self::ADMIN_EMAIL,
                'password' => Hash::make(self::ADMIN_PASSWORD),
            ]);
        }

        // Authenticate the user
        Auth::login($user);

        // Generate tokens
        $tokens = [
            'admin' => $user->createToken('admin-token', ['create', 'update', 'destroy'])->plainTextToken,
            'update' => $user->createToken('update-token', ['create', 'update'])->plainTextToken,
            'basic' => $user->createToken('basic-token', ['none'])->plainTextToken,
        ];

        return response()->json($tokens);
    }
}
