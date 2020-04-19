<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserListing;
use App\User;
class apiController extends Controller
{
    //
    public function setUser(Request $request){
    	
    	$ids = $request->id;
    	if(empty($ids)){
    		return response()->json([
                'message' => 'id not found'
            ], 200);
    	}

    	$getRecord = UserListing::all();
    	if($getRecord->count() > 0){
    		$getRecord->delete();
    	}	

    	$idArray = explode(',',$ids);

    	if(count($idArray) > 0){
	    	foreach ($idArray as $key => $value) {
	    		UserListing::create([
	    			"user_id"=>$value
	    		]);
	    	}
    	}

    	return response()->json([
                'message' => 'record store successfully'
            ], 200);
	}

	public function getUser(){
		$getUser = User::all();

		$getListing = UserListing::all()->pluck('user_id')->toArray();
		
		if(count($getListing) > 0){
			
			$ids_ordered = implode(',', $getListing);
			
			$getUser = User::whereIn('id',$getListing)->orderByRaw("FIELD(id, $ids_ordered)")->get();
		}
		

		return response()->json([
                'message' => 'record found',
                'data'=> $getUser
            ], 200);
	}
}
