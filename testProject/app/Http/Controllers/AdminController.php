<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Создает пользователя и возвращает `access_token`
     *
     * @param  array  $data
     * @return array
    */
    public function store(Request $request) {
        $user = User::create([
            'username' => $request->all()['username'],
            'password' => Hash::make($request->all()['password']),
            'api_token' => Str::random(60)
        ]);

        return ['access_token' => $user['api_token']];
    }
    
    /**
     * Обновляет и возвращает `access_token`
     *
     * @param  mixed $request
     * @return array
     */
    public function update(Request $request) {
        User::where('username', $request->all()['username'])->first()->update(['api_token' => Str::random(60)]);
        return ['access_token' => User::where('username', $request->all()['username'])->first()['api_token']];
    }
}
