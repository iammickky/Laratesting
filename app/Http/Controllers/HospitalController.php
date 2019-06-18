<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Provider\fr_BE\Address;
use Carbon\Carbon;
use App\Hospital;

class HospitalController extends Controller
{
    public function hospitals(){
        $hospitals = Hospital::all();
        return response() ->json($hospitals);
    }

    public function index($id){
        $hospitals = DB::table('hospital') -> where ('id',$id) -> get(); 
        return response() ->xml($hospitals);
    }


    public function hospitalspost(Request $request){
        $name = $request->input('name');
        $address = $request->input('address');
        $numberOfBeds = $request->input('numberOfBeds');
        $numberOfDoctors = $request->input('numberOfDoctors');
        $id = DB::table('hospitals')->insertGetId(['name'=>$name, 'address'=>$address, 'numberOfBeds'=>$numberOfBeds, 'numberOfDoctors'=>$numberOfDoctors, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]);
        return response()->json([], 201 );
    }
}

