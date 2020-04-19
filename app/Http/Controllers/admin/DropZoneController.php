<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Validator;
use FileReceiver;
class DropZoneController extends Controller
{
    //
    public function index(){
        return view('admin.drop_zone');
    }

    public function saveFile(Request $request) {
        
        $file = $request->file('file');
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('images'),$fileName);
        return response()->json(['success'=>$fileName]);
            

    }
}   
