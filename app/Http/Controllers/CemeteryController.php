<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cemetery;

class CemeteryController extends Controller
{
    public function getAllCemeteries(Request $request){
        $cemeteries = Cemetery::get();

        return response()->json([
            'status' => true,
            'cemetery' => $cemeteries
        ], 200);
    }
}
