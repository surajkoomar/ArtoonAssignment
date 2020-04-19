@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <!-- <div class="card-header">Dashboard</div> -->

               
				<table class="table">
                 	<tr>
                 		<th>Sr. No.</th>
                 		<th>Invoice Id</th>
                 		<th>Action</th>   
                 	</tr>
                    @if($getInvoiceList->count() > 0)
                        @foreach($getInvoiceList as $key=>$val)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$val->invoice_id}}</td>
                                <td><a href="{{url('/viewInvoicePDF/'.$val->id)}}">View</a></td>
                            </tr>    
                        @endforeach
                    @endif	
                 </table>
            </div>
            {{ $getInvoiceList->links() }}

        </div>

    </div>
</div>

@endsection
