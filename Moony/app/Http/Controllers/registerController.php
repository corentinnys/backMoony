<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\password;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(Request $request)
    {
        $firstName = $request->input('name');
        $lastName = $request->input('lastName');
        $mail = $request->input('email');
        $password = $request->input("password");
        $ddn = $request->input('ddn');
        $sexe = $request->input('sexe');
        $phone = $request->input('phone');
        $status = $request->input('status');


        $genre = ($sexe == "homme") ? 1 : 0;



        User::create([
            'name' => $firstName,
            'lastname' => $lastName,
            'email' => $mail,
            'password' => Hash::make($password),
            'dateNaissance' => $ddn,
            'sexe' => $genre,
            'phone' => $phone,
            'status' => $status
        ]);
        return response()->json("user ajouter");
    }


}
