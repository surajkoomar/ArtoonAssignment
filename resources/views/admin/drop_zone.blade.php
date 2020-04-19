@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <!-- <div class="card-header">Dashboard</div> -->

              <div class="card-body">
              <form action="{{ url('saveFile') }}" enctype="multipart/form-data" class="dropzone" id="fileupload" method="POST">
              @csrf
      				<input type="hidden" name="item_id" value="">
      				<div class="fallback">
           			<input name="file" type="files"  />
      				</div>
				</form>
            	</div>
        	</div>
    	</div>
    </div>	
</div>

@endsection
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script>
  Dropzone.options.imageUpload = {
            maxFilesize: 5  ,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
         //   chunkSize:true
        }; 
</script>  