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

        // Check if 'sexe' is set, and if not, set a default value (e.g., 0 for 'femme')
        $genre = ($sexe == "homme") ? 1 : 0;

        // You can add some debugging statements here to check the values
        // dd($firstName, $lastName, $mail, $password, $ddn, $sexe, $phone, $status, $genre);

        User::create([
            'name' => $firstName,
            'lastName' => $lastName,
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
