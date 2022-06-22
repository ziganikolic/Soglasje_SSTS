<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrivolitevResource;
use App\Models\Kategorija;


class PrivolitevController extends Controller
{
    public function index()
    {           
        $kategorije = Kategorija::with('privolitev')->get();
        return PrivolitevResource::collection(compact('kategorije'));
    }
}
