<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    public function User()
    {
        return User::all();
    }

    public function show($oddelek){
       $oddelek = user::query()
       ->where('oddelek', [$oddelek])
       ->get();
       
       return $oddelek;
    }

    public function destroy($id)
    {   
        // delete user
        $user = User::query()
        ->where('id', [$id])
        ->delete();

    }

    public function saveExcelUsers(Request $request)
    {  
 
        $users = $request->users;
        $oddelek = $request->oddelek;
        $pwd = $request->pwd;

        $i = 0;

        foreach($users as $user){
            $datasave = new User;
            $datasave->ime = $user['Ime'];
            $datasave->priimek = $user['Priimek'];
            $datasave->email = $user['Email'];
            $datasave->email_verified_at = now();        //za pravilno delovanje potrebna sprememba (na mail poslan link s katerim verificira profil in pridobi geslo (v testiranju)
            $datasave->password = Hash::make($pwd[$i]);
            $datasave->oddelek = $oddelek;
            $datasave->vloga = 1;
            //$datasave->data = serialize($data);
            $datasave->save();
            $i += 1;


        }

        return response()->json([
            "message" => "Uporabniki so kreirani"
        ], 201);

    }

    public function destroyALL(Request $request)
    {
        $users = $request->users;
        

        for($i=0; $i < count($users); $i++){
            $user = User::query()
            ->where('id', [$users[$i]])
            ->delete();

        }
        return response()->json("error");

    }

}
