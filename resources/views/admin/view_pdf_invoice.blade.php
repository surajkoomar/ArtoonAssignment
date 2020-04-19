<style>
	h2{
		text-align: center;
	}

	.image_logo{
		height:05%;
		width:70%;
	}

	.logo{
		position: absolute;
        margin:auto;
	}
	.footer{
		height:3%;
		width:1000%;
		background-color:#e91ebd;
	}
	table{
		width: 100%
		/*border:1px solid #150202 !important;*/
	}

	table, tr {
 		 border: 1px solid #150202 !important;
	}

	table, td, th{
 		 border-bottom: 1px solid #150202 !important;
 		 border-right: 1px solid #150202 !important;
	}

	.number{
		font-size: 18px;
    	position: absolute;
    	top: 18px;
    	margin-left: 10px;
    	right:15px;
	}

	.date{
		font-size: 18px;
    	position: absolute;
    	top: 245px;
    	margin-left: 10px;
    	right:15px;
	}

	h5 {
  		border-bottom: 1px solid black;
		}

	.user_data{
		width: 30% !important;
		height:12% !important;
		}

	.add{
		 font-size: 10;
		}	
	.number1{
		position: absolute;
		font-size: 15px;
		/*right: 16px;*/
		/*margin-right:10px;*/

	}
	.signature_logo{
		width:8%;
		height:8%;
	}
	p{
		font-size: 15px;
	}

</style>	
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  -->
 <!-- <link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet">  -->


<html>
<body>


	<br>
	<hr>
		<p align="center" class="add">C-301, Diamond World, Varachha Road, Kohinoor Rd, Mini Bazar, Surat, Gujarat 395006  • artoon@gmail.com</p>
	<hr>
	
	
	<div class="row">
	<div align="center">
		
		<span class="number" align="right" style="padding-top: 70px;">Invoice Id:-<b>invoice_{{$invoiceId}}</b></span>
	</div>
	</div>		
	<br><br><br>
	<div class="user_data col-md-3">
		To,<br>
		<h5>Suraj Gupta,</h5>
		
	</div>
	<div class="clearfix"></div>


	   <h4 align="center"><b>Contents</b></h4>

	   <table class="table table-bordered">
	   		<tr>
	   			<th style="width:10%">Sr.No.</th>
	   			<th style="width:50%">Content</th>
	   			<th style="width:20%">Gst</th>
	   			<th style="width:20%">Amount</th>
	   		</tr>
	   		@if($invoiceData->count() > 0)
	   			@foreach($invoiceData as $key=>$val)
	   				<tr>
			   			<th style="width:10%">{{$key+1}}</th>
			   			<th style="width:50%">{{$val->content}}</th>
			   			<th style="width:20%">{{$val->gst}}</th>
			   			<th style="width:20%">{{$val->amount}}</th>
		   			</tr>	
	   			@endforeach
	   		</tr>
	   		@endif	
	   </table>
	   
	    <br>
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thanking Best Regards.
	    <br><br>
	    <div align="right">
		For <b>Artoon Solutions
		<br><br>
		
		</div>	

	</div>	





</body>	
</html>