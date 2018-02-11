@extends ('layouts.app')
@section('content')
<h1>My medical staff</h1>
@if ($errors->has('privtyp_id'))
    <span class="alert alert-warning">
        <strong>{{ $errors->first('privtyp_id') }}</strong>
    </span> 
@endif	
<table class="table table-hover table-responsive-md">
	<thead>
     	<tr> 
	     	<th class="col-md-1">Employee #</th> 
	     	<th class="col-md-3">Name</th>
	     	<th class="col-md-1">Speciality</th>
	     	<th class="col-md-1">Category</th>
	     	<th class="col-md-1">Department</th>
	     	<th class="col-md-1">Last Priviliges</th>
	     	<th class="col-md-4">start process of Privilies</th>
	     </tr> 
    </thead>
    <tbody>

 		@foreach($MedS as $dd) 
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
	    		<td class="center">{{$dd->Edate}}</td>
	    		<td class="center">
	    			<form action="{{route('startPriv')}}" method="POST" class="form-inline">
				            {{ csrf_field() }}
			            <input type="hidden" name="id" value="{{$dd->id}}">
				        <input type="hidden" name="specno" value="{{$dd->specno}}">
						
						<select class="form-control" id="privtyp_id" name="privtyp_id">
                                <option disabled selected value> -- select privilege type -- </option>
                                @foreach($PriV as $pp)
                                    <option  {{old('privtyp_id')==$pp->id? 'selected':''}}
                                     value={{ $pp->id}} > {{$pp->type_desc}}</option>
                                @endforeach
                        </select>
	    				<button class="btn btn-info btn-sx"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
	    			</form>
	    		</td>
    		</tr>
		@endforeach
	</tbody>
</table>
@endsection