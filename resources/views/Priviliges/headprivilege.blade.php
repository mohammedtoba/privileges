@extends ('layouts.app')
@section('content')

<form action="{{route('headUpdate')}}" method="post"    enctype="multipart/form-data" id="privilege_form">
		{{ csrf_field() }}
		
    <input type="hidden" name="count" value="{{$c}}">
	<input type="hidden" name="templno" value="{{$temp[0]->templno}}">
	<input type="hidden" name="medstaff_id" value="{{$StfPriv->medstaff_id}}">
	<input type="hidden" name="staffpriv_id" value="{{$StfPriv->id}}">
	<input type="hidden" name="catgno" value="{{$StfPriv->catgno}}">
	<input type="hidden" name="specno" value="{{$StfPriv->specno}}">

	<h2>List of privileges by speciality , to Approve please check it	</h2>					    
	@if ($errors->has('head_deci_id'))
    <span class="alert alert-warning">
        <strong>{{ $errors->first('head_deci_id') }}</strong>
    </span> 
	@endif
	<div class="pre-scrollable">
		<table   class="table table-hover table-responsive-md" >
						<!-- //create the row counter -->
			<thead>
		     	<tr> 
		     		<th class="col-md-1">Group </th> 
			     	<th class="col-md-3">Item</th> 
			     	<th class="col-md-2">Staff opinion</th>
			    	<th class="col-md-2">Staff comment</th>
			     	<th class="col-md-2">Head opinion</th>
			    	<th class="col-md-2">Head comment</th>
				</tr> 
	     	</thead>
     		<tbody>
 			@foreach($groups as $s)
 				<tr>
 					<td colspan="8" id="table_scope" >{{$s->group_desc}}</td>
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
								<td> {{$t->dec_desc}}</td>
								<td> {{$t->staff_comment}}  </td>

								<td>
									<select class="form-control" id="head_deci_id{{$t->templdetno}}" name="head_deci_id{{$t->templdetno}}">
			                                <option disabled selected value> -- select one  -- </option>
			                                @foreach($DecTyp as $dt)
			                                    <option  {{old('head_deci_id')==$dt->id? 'selected':''}}
			                                     value={{ $dt->id}} > {{$dt->dec_desc}}</option>
			                                @endforeach
			                        </select>
						 		 </td>
						 		 <td>
						 		 	<input type="text"  name="head_comment{{$t->templdetno}}" value="{{$t->head_comment}}">
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
	<button type="submit" class="btn btn-primary">Approve</button>
    <a class="btn btn-close" href="{{ route('delPriv',$StfPriv->id) }}">Delete Request</a>
	</div>
            
	 			
</form>


@endsection