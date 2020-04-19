@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if(Session::has('msg'))
      {{Session::get('msg')}}
    @endif
  </div>  
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
              <form action="{{ url('saveInvoice') }}"  method="POST">
                @csrf
                <table class="table">
                  <thead>
                    <tr>
                      <th>Content</th>
                      <th>gst(in %)</th>
                      <th>Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                    <tbody id="invoice_content">
                      
                      <tr>
                        <td><input type="text" name="content[]"/></td>
                        <td><input type="text" name="gst[]"/></td>
                        <td><input type="text" name="amt[]"/></td>
                        <td><input type="button" onclick="add_row()" value="add"/></td>
                      </tr>
                      <tr>
                          <td colspan="4" align="center"><input type="submit"  value="Submit"/></td>
                      </tr>
                    </tbody> 
                    
                      
                     
                </table>
                </form> 
                <!-- <div class="card-header">Dashboard</div> -->
            </div>
        	</div>
    	</div>
    </div>	
</div>

@endsection
<script src="{{url('js/jquery.min.js')}}"></script>

<script>
    
    var i =1;


    function add_row(){
      var trAppend = '<tr class="delete_record_'+i+'"><td><input type="text" name="content[]"/></td><td><input type="text" name="gst[]"/></td><td><input type="text" name="amt[]"/></td><td><input type="button" onclick="delete_row('+i+')" value="delete"/></td></tr>'
      $("#invoice_content").append(trAppend);
      
      i++;
      
    }

    function delete_row(i){
        $(".delete_record_"+i).remove(); 
    }
   
</script>  