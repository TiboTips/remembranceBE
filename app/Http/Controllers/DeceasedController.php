<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeceasedController extends Controller
{
    public function getAllDeceased(Request $request){
        $deceased = Deceased::get();

        return response()->json([
            'status' => true,
            'deceased' => $deceased
        ], 200);
    }

    public function getFilteredDeceased(Request $request){
        $check = Validator::make($request->all(), [
            'cemetery' => 'string',
            'lastName' => 'string',
            'firstName' => 'string',
            'dateOfBirth' => 'string',
            'dateOfDeath' => 'string',
            'yearOfBirth' => 'integer',
            'yearOfDeath' => 'integer',
            'fullYearOfbirth' => 'boolean',
            'fullYearOfDeath' => 'boolean',
        ]);
        if ($check->fails()) {
            return response()->json(['status' => false, 'message' => $check->errors()->first()], 400);
        }
        
        if($request->fullYearOfBirth && $request->fullYearOfDeath){
            $deceased = Deceased::
            where('lastName', $request->lastName)
            ->where('firstName', $request->firstName)
            ->get();
        }else{
            $deceased = Deceased::
            where('lastName', $request->lastName)
            ->where('firstName', $request->firstName)
            ->get();
        }


        return response()->json([
            'status' => true,
            'deceased' => $deceased
        ], 200);

    }
}
