@extends ('layouts.app')
@section('content')

<form action="{{route('savePriv')}}" method="post"    enctype="multipart/form-data" id="privilege_form">
		{{ csrf_field() }}
		
    <input type="hidden" name="count" value="{{$c}}">
	<input type="hidden" name="templno" value="{{$temp[0]->templno}}">
	<input type="hidden" name="medstaff_id" value="{{$MedS->id}}">
	<input type="hidden" name="staffpriv_id" value="{{$priv->id}}">
	<input type="hidden" name="catgno" value="{{$MedS->catgno}}">
	<input type="hidden" name="specno" value="{{$MedS->specno}}">

	<h2>List of privileges by speciality , to request please check it	</h2>					    
	@if ($errors->has('staff_deci_id'))
    <span class="alert alert-warning">
        <strong>{{ $errors->first('staff_deci_id') }}</strong>
    </span> 
	@endif
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
						 		 	<input type="text"  name="staff_comment{{$t->templdetno}}" value="{{$t->staff_comment}}">
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
	<button type="submit" class="btn btn-primary">save</button>
    <a class="btn btn-close" href="{{ route('delPriv',$priv->id) }}">Cancel</a>
	</div>
            
	 			
</form>


@endsection