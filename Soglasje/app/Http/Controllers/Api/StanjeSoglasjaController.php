<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\PrivolitevResource;
use App\Http\Resources\StanjeSoglasjaResource;
use App\Models\Privolitev;
use App\Models\Kategorija;
use App\Models\User;
use App\Models\stanje_soglasja;
use Whoops\Run;

class StanjeSoglasjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::with('stanje_soglasja')->get();
        return StanjeSoglasjaResource::collection(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $kategorije = array(1,1,1,1,1,1,
                            2,2,2,2,2,2,
                            3,3,3,3,3,3,
                            4,4,4,4,4,4,
                            5,5,5,5,5,5,
                            6,6,6,6,6,6,
                            7,7,7,7,7,7,
                            8,8,8,8,8,8,
                            9,
                            10,10,
                            11,11,11,11);
        $privolitev = $request->text;

        $id = $request->user_id;


$privolitev_list = [];
        
foreach($privolitev as $item){
    foreach($item as $a){
    if($a == 1 || $a === true || $a === "true"){
    $a = 1;
    // print_r($a);
    }else if($a === null || $a === "null" || $a === false || $a === 0){
        $a = 0;
    // print_r($a);
    }

    array_push($privolitev_list, $a);
    }
}  



        for($i=0; $i < count($privolitev_list); $i++){
            $datasave = new stanje_soglasja;
            $datasave->user_id = $id;
            $datasave->privolitev_id = $i + 1;
            $datasave->izbira = $privolitev_list[$i];
            $datasave->kategorija_id = $kategorije[$i];
            // $datasave->data = serialize($data);
            $datasave->save();
        }
        return response()->json([
            "message" => "Privolitev je poslana"
        ], 201);

            
        // return stanje_soglasja::create($request->all());

        //Za potrebe validacije
        // $request->validate([
        //     'user_id' => 'required'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return stanje_soglasja::find($id);
        // return user::query()
        //      ->where('id', [$id])
        //      ->get();

    $user = user::query()
    ->where('id', [$id])
    ->with('stanje_soglasja')
    ->get();

    // $user = user::with('stanje_soglasja')->get();
 
    return StanjeSoglasjaResource::collection(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update a stanje_soglasja
        $stanje_soglasja = stanje_soglasja::find($id);
        $stanje_soglasja->update($request->all());
        return $stanje_soglasja;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a post
        $stanje_soglasja = stanje_soglasja::query()
            ->where('user_id', [$id])
            ->delete('stanje_soglasja');


        return response()->json([
            "message" => "Uporabniki so izbrisani"
        ], 201);
    }

    public function destroyALL(Request $request)
    {
        $users = $request->users;
        

        for($i=0; $i < count($users); $i++){
            
            $stanje_soglasja = stanje_soglasja::query()
            ->where('user_id', [$users[$i]])
            ->delete('stanje_soglasja');

        }
        return response()->json("error");

    }

    
}



