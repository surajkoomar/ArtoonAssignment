<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InvoiceItem;

class InvoiceController extends Controller
{
    //
    public function index(){
    	return view('invoice_create');
    }

    public function saveInvoice(Request $request){
    	
    	$saveInvoice = Invoice::create(['invoice_id'=>'invoice_']);
    	$invoiceId = $saveInvoice->id;
    	Invoice::where('id',$invoiceId)->update(['invoice_id'=>'invoice_'.$invoiceId]);
    	if(count($request->content)>0){
    		foreach ($request->content as $key => $value) {
    			InvoiceItem::create([
    				"inv_id"=>$invoiceId,
    				"content"=>$request->content[$key],
    				"gst"=>$request->gst[$key],
    				"amount"=>$request->amt[$key]
    			]);
    		}
    	}
    	return redirect()->back()->with('msg','invoice generated successfully');
    }
}
