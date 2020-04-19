<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;
use PDF;
class InvoicePDFController extends Controller
{
    //
    public function index(){
    	$getInvoiceList = Invoice::paginate(10);
    	return view('admin.invoice_list',compact('getInvoiceList'));
    }

    public function viewPDF($invoiceId){	 
    	 $invoiceData = Invoice::leftJoin('invoice_items','invoice_items.inv_id','invoices.id')->where('invoices.id',$invoiceId)->get();
         $pdf = PDF::loadView('admin.view_pdf_invoice',compact('invoiceData','invoiceId'));

         $companyPdf = 'invoice_'.$invoiceId.'.pdf';
         $companyPdf = str_replace(' ', '_', $companyPdf);

         return $pdf->download($companyPdf);
    }     
}
