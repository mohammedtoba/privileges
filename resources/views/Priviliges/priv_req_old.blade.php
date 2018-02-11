 @extends ('layouts.app')
@section('content')


@if ($errors->has('privtyp_id'))
<span class="alert alert-warning">
    <strong>{{ $errors->first('privtyp_id') }}</strong>
</span> 
@endif


<h1>Apply for privileges</h1>

<form action="{{route('saveStfPriv')}}" method="post"    enctype="multipart/form-data" id="staff_privilege_form">
		{{ csrf_field() }}
		
	<input type="text" name="medstaff_id" value="{{$MedS[0]->id}}">
	<input type="text" name="templno" value="{{$temp[0]->templno}}">
	<input type="text" name="catgno" value="{{$MedS[0]->catgno}}">
	<input type="text" name="specno" value="{{$MedS[0]->specno}}">
	<input type="text" name="depno" value="{{$MedS[0]->depno}}">
	<input type="text" name="dept_nam" value="{{$MedS[0]->dept_nam}}">
	<input type="text" name="catg_desc" value="{{$MedS[0]->catg_desc}}">
	<input type="text" name="spec_desc" value="{{$MedS[0]->spec_desc}}">
	<input type="hidden" name="count" value="{{$c}}">

	<select class="form-control" id="privtyp_id" name="privtyp_id"  {{ $errors->has('privtyp_id') ? ' has-error' : '' }}>
	        <option disabled selected value> -- select privilege type -- </option>
	        @foreach($PriV as $pp)
	            <option  {{old('privtyp_id')==$pp->id? 'selected':''}}
	             value={{ $pp->id}} > {{$pp->type_desc}}</option>
	        @endforeach
	</select>

@if ($errors->has('staff_deci_id'))
<span class="alert alert-warning">
    <strong>{{ $errors->first('staff_deci_id') }}</strong>
</span> 
@endif

	<h2>List of privileges by speciality , to request please check it	</h2>					    
 
	<div class="pre-scrollable">
		<table   class="table table-hover table-responsive-md" >
						<!-- //create the row counter -->
			<thead>
		     	<tr> 
		     		<th class="col-md-2">Group </th> 
			     	<th class="col-md-6">Item</th> 
			     	<th class="col-md-2">Request</th>
			    	<th class="col-md-2">Comment</th>
				</tr> 
	     	</thead>
     		<tbody>
 			@foreach($groups as $s)
 				<tr>
 					<td colspan="4" id="table_scope" >{{$s->group_desc}}</td>
 				</tr>
 				
				@foreach($category as $c)

					@if($c->group_desc == $s->group_desc)
					<td rowspan="{{($c->count)+1}}" id="table_category">{{$c->group_desc}}</td>
						@foreach($temp as $t)
							
							@if($t->catgno == $c->catgno)
							<tr>
								<td>
									<input type="hidden" name="templdetno{{$t->templdetno}}" value="{{$t->templdetno}}">
									{{$t->templdet_desc}}

								</td>

								<td>
									<select class="form-control" id="staff_deci_id{{$t->templdetno}}" name="staff_deci_id{{$t->templdetno}}">
			                                <option disabled selected value> -- select one  -- </option>
			                                @foreach($DecTyp as $dt)
			                                    <option  {{old('staff_deci_id')==$dt->id? 'selected':''}}
			                                     value={{ $dt->id}} > {{$dt->dec_desc}}</option>
			                                @endforeach
			                        </select>
						 		 </td>
						 		 <td>
						 		 	<input type="text" id="staff_comment{{$t->templdetno}}"  name="staff_comment{{$t->templdetno}}" value="{{$t->staff_comment}}">
						 		 </td>
				 		 	</tr>
				 		 	@endif
						@endforeach
					@endif
				@endforeach
			@endforeach
			</tbody>
		</table>
	</div>


	<div>
	<button type="submit" class="btn btn-primary">Apply</button>
    <a class="btn btn-close" href="#">Cancel</a>
	</div>
            
	 			
</form>


@endsection



