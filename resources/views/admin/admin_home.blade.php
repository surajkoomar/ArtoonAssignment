@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body">
                <div class="col-md-12" align="right"><a href="{{'saveFile'}}">Add</a></div>      
                <table class="table" id="userData">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>    
                    <tbody>
                        
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>

@endsection


<link href="{{url('css/datatable.min.css')}}" rel="stylesheet">
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/datatable.min.js')}}"></script>
<script>
  var table;
   $(document).ready(function() {
       $.noConflict(); 
       table = $('#userData').DataTable({
       processing: true,
      // serverSide: true,
       ajax: '{{ url("getAllUser") }}',
       columns: [
                { data: 'DT_RowIndex',orderable: false, searchable: false},
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action' }
             ]
        });
      //  table = $('#userData').DataTable();
        $('#userData').on("click", "button", function(){
        table.row($(this).parents('tr')).remove().draw(false);
        });
    });
  

        
    


  function delete_user(id){
  $.ajax( {
      headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
            url:'{{url("deleteUser")}}',
            method:'POST',
            data:{
              id,id
            },
            success: function(data) { 
                alert(data.msg);
              },  
            
         }); 

  }
</script>    