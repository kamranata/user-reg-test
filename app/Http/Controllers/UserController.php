<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        $user->country()->create([
            'country_id' => $validated['country_id'],
        ]);

        $user->phone_number()->create([
            'phone_number' => $validated['phone_number'],
        ]);

        // SendSMS
        // SendEmail

        return response($user, 201);
    }
}
