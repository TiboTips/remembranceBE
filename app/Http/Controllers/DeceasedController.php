<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deceased;
use App\Models\Cemetery;
use App\Models\CemeterySection;
use App\Models\RestingPlace;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DeceasedController extends Controller
{
    public function getAllDeceased(Request $request){
        $deceased = Deceased::get();

        return response()->json([
            'status' => true,
            'deceased' => $deceased
        ], 200);
    }

    public function getSpecificDeceased(Deceased $deceased){
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
            'dateOfBirth1' => 'string',
            'dateOfBirth2' => 'string',
            'dateOfDeath1' => 'string',
            'dateOfDeath2' => 'string'
        ]);
        if ($check->fails()) {
            return response()->json(['status' => false, 'message' => $check->errors()->first()], 400);
        }

        $dateOfBirth1 = $request->dateOfBirth1;
        $dateOfBirth2 = $request->dateOfBirth2;
        $dateOfDeath1 = $request->dateOfDeath1;
        $dateOfDeath2 = $request->dateOfDeath2;
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        if($request->has('cemetery')){
            $cemeteryName = $request->cemetery;
        }else{
            return response()->json([
                'status' => false,
                'message' => "kerkhof is niet meegegeven",
            ], 400);
        }

        if($dateOfBirth1 === null && $dateOfBirth2 === null && $dateOfDeath1 === null && $dateOfDeath2 === null){
            $deceased = Deceased::
            join('resting_places', 'resting_places.id', '=', 'deceaseds.restingPlace_id')
            ->join('cemetery_sections', 'cemetery_sections.id', '=', 'resting_places.cemeterySection_id')
            ->join('cemeteries', 'cemeteries.id', '=', 'cemetery_sections.cemetery_id')
            ->where('cemeteries.name', '=', $cemeteryName)
            ->where('lastName', 'like', '%'.$lastName.'%')
            ->where('firstName', 'like', '%'.$firstName.'%')
            ->get();
        }else{
            if($dateOfBirth1 === null){
                $dateOfBirth1 = Carbon::minValue();
            }
            if($dateOfBirth2 === null){
                $dateOfBirth2 = Carbon::maxValue();
            }
            if($dateOfDeath1 === null){
                $dateOfDeath1 = Carbon::minValue();
            }
            if($dateOfDeath2 === null){
                $dateOfDeath2 = Carbon::maxValue();
            }
            $deceased = Deceased::join('resting_places', 'resting_places.id', '=', 'deceaseds.restingPlace_id')
                ->join('cemetery_sections', 'cemetery_sections.id', '=', 'resting_places.cemeterySection_id')
                ->join('cemeteries', 'cemeteries.id', '=', 'cemetery_sections.cemetery_id')
            ->where(function($query) use($dateOfBirth1, $dateOfBirth2, $dateOfDeath1, $dateOfDeath2, $firstName, $lastName, $cemeteryName){
                $query
                ->where('cemeteries.name', '=', $cemeteryName)
                ->where('lastName', 'like', '%'.$lastName.'%')
                ->where('firstName', 'like', '%'.$firstName.'%')
                ->whereBetween('dateOfBirth', [$dateOfBirth1, $dateOfBirth2])
                    ->whereBetween('dateOfDeath', [$dateOfDeath1, $dateOfDeath2]);
            })->orWhere(function($query) use($dateOfBirth1, $dateOfBirth2, $dateOfDeath1, $dateOfDeath2, $firstName, $lastName, $cemeteryName){
                $query
                ->where('cemeteries.name', '=', $cemeteryName)
                ->where('lastName', 'like', '%'.$lastName.'%')
                ->where('firstName', 'like', '%'.$firstName.'%')
                ->WhereBetween('yearOfBirth', [substr($dateOfBirth1, 0, 4), substr($dateOfBirth2, 0, 4)])
                    ->WhereBetween('yearOfDeath', [substr($dateOfDeath1, 0, 4), substr($dateOfDeath2, 0, 4)]);
            })
            ->get();
        }

        if($deceased->count() > 50){
            return response()->json([
                'status' => false,
                'message' => "verfijn zoekopdracht",
            ], 400);
        }

        return response()->json([
            'status' => true,
            'deceased' => $deceased,
        ], 200);

    }
}
