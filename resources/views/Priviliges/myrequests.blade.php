@extends ('layouts.app')
@section('content')
<h1>My Requests</h1>
 
<table class="table table-hover table-responsive-md">
	<thead>
     	<tr> 
	     	<th class="col-md-1">Request #</th> 
	     	<th class="col-md-2">Request Date</th>
	     	<th class="col-md-2">Request Type</th>
	     	<th class="col-md-2">Status</th>
	     	<th class="col-md-2">Approval Date</th>
	     	<th class="col-md-2">Finalizing Date</th>
			<th class="col-md-1"></th> 
	    </tr> 
    </thead>
    <tbody>
 		@foreach($PriV as $dd) 
	    	<tr 
	    	@if($dd->priv_status=='F')
	    	 style="color:green;"
	    	 @endif
	    	 > 
	    		<td class="center">{{$dd->id}}</td>
	    		<td style="overflow-wrap: normal;">{{$dd->created_at}}</td>
	    		<td class="center">{{$dd->type_desc}}</td>
	    		<td class="center">  
					@if($dd->priv_status=='MS') Staff saved @endif
					@if($dd->priv_status=='WH') Waiting for head @endif
					@if($dd->priv_status=='HS') Head saved @endif
					@if($dd->priv_status=='WC') Waiting for committee @endif
					@if($dd->priv_status=='CS') Committee saved	 @endif
					@if($dd->priv_status=='F') Finallized @endif
	    		</td>
	    		<td class="center">{{$dd->head_approv_dt}}</td>
	    		<td class="center">{{$dd->committe_approv_dt}}</td>
	    		<button class="btn btn-info"><span class="fa fa-file-o" aria-hidden="true"></span> Edit</button>
    		</tr>
		@endforeach
	</tbody>

	<form action="{{route('priv_req')}}" method="GET" class="form-inline">
				            {{ csrf_field() }}
		<button class="btn btn-info btn-sx"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>	
	</form>
</table>
@endsection