@extends ('layouts.app')
@section('content')
<h1>Pending Requests for Committe action</h1>
 
<table class="table table-hover table-responsive-md">
	<thead>
     	<tr> 
	     	<th class="col-md-1">Employee #</th> 
	     	<th class="col-md-3">Name</th>
	     	<th class="col-md-2">Speciality</th>
	     	<th class="col-md-1">Category</th>
	     	<th class="col-md-2">Department</th>
	     	<th class="col-md-1">Request ID</th>
	     	<th class="col-md-2">Request Type</th>
	     </tr> 
    </thead>
    <tbody>

 		@foreach($PriV as $dd) 
	    	<tr 
	    	@if($dd->med_actv=='N')
	    	 style="color:grey;"
	    	 @endif
	    	 > 
	    		<td class="center">{{$dd->empno}}</td>
	    		<td style="overflow-wrap: normal;">{{$dd->full_name}}</td>
	    		<td class="center">{{$dd->spec_desc}}</td>
	    		<td class="center">{{$dd->catg_desc}}</td>
	    		<td class="center">{{$dd->dept_nam}}</td>
	    		<td class="center">{{$dd->priv_id}}</td>
	    		<td class="center">{{$dd->type_desc}}</td>
	    		<td class="center">
	    			<form action="{{route('commStart')}}" method="POST" class="form-inline">
				            {{ csrf_field() }}
			            <input type="hidden" name="id" value="{{$dd->id}}">
				        <input type="hidden" name="specno" value="{{$dd->specno}}">
				        <input type="hidden" name="catgno" value="{{$dd->catgno}}">
				        <input type="hidden" name="depno" value="{{$dd->depno}}">
				        <input type="hidden" name="priv_id" value="{{$dd->priv_id}}">
				        <input type="hidden" name="privtyp_id" value="{{$dd->privtyp_id}}">
				        <input type="hidden" name="templno" value="{{$dd->templno}}">
						
	    				<button class="btn btn-info btn-sx"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
	    			</form>
	    		</td>
    		</tr>
		@endforeach
	</tbody>
</table>
@endsection