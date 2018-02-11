@extends('layouts.app')

@section('content')
	<h1>Department control panel</h1>
	</br>

	<h2>Add a new department</h2>
	<table class="table table-hover">
		<thead>
	     	<tr> 
		     	<th class="col-md-3">Department name</th> 
		     	<th class="col-md-3">Head of department</th>
		     	<th class="col-md-3">Parent department</th>
		     	<th class="col-md-2"></th>
		     	<th class="col-md-1"></th>
		     	<th class="col-md-1"></th>
		     </tr> 
	    </thead>
	    <tbody>
    		<tr>
    			<form action="{{route('saveDept')}}" method="POST">
					            {{ csrf_field() }}
    			<td>
    				<input type="text" class="form-control" id="dept_nam" name="dept_nam">
    			</td>
    			<td>
    				<select class="form-control" id="head_userid" name="head_userid">
	            				<option disabled selected value> -- select department head -- </option>
				                @foreach($user as $u) 
				                <option {{old('head_userid')==$u->id? 'selected':''}}  value={{ $u->id}} > {{$u->name}}</option>
				                @endforeach
    				</select>
    			</td>
    			<td>
    				<select class="form-control" id="parent_depno" name="parent_depno">
	            				<option disabled selected value> -- select parent daprtment -- </option>
				                @foreach($depts as $de) 
				                <option {{old('parent_depno')==$de->id? 'selected':''}}  value={{ $de->id}} > {{$de->dept_nam}}</option>
				                @endforeach
	        				</select>
    			</td>
    			
    			<td>
    				<button type="submit" class="btn btn-sx btn-primary">save</button>
    			</td>
    			</form>
    			<td></td>
    			<td></td>
    		</tr>
		</tbody>
	</table>

	<h2>Manage departments</h2>
	<table class="table table-hover">
		<thead>
	     	<tr> 
		     	<th class="col-md-3">Department name</th> 
		     	<th class="col-md-3">Head of department</th>
		     	<th class="col-md-3">Parent department</th>
		     	<th class="col-md-2">Update</th>
		     	<th class="col-md-1">Activate/</br>Deactivate</th>
		     	<th class="col-md-1">Delete</th>
		     </tr> 
	    </thead>
	    <tbody>
	 		@foreach($deptDetail as $dd) 
		    	<tr 
		    	@if($dd->dept_actv=='N')
		    	 style="color:grey;"
		    	 @endif
		    	 > 
		    		<form action="{{route('editDept',$dd->id)}}" method="POST">
					            {{ csrf_field() }}
			    		<td>
			    			@if($dd->dept_actv=='N')
		    	 			Inactive: 
		    	 			@endif
			    			{{$dd->dept_nam}}</td>
						<td>
							<select class="form-control" id="head_userid" name="head_userid"
							@if($dd->dept_actv=='N') disabled @endif>
	            				<option disabled selected value> -- select department head -- </option>
				                @foreach($user as $u) 
				                <option {{old('head_userid',$dd->head_userid)==$u->id? 'selected':''}}  value={{ $u->id}} > {{$u->name}}</option>
				                @endforeach
	        				</select>
						</td>
						<td>
							<select class="form-control" id="parent_depno" name="parent_depno" 
							@if($dd->dept_actv=='N') disabled @endif>
	            				<option disabled selected value> -- select parent daprtment -- </option>
				                @foreach($depts as $de) 
				                <option {{old('parent_depno',$dd->parent_depno)==$de->id? 'selected':''}}  value={{ $de->id}} > {{$de->dept_nam}}</option>
				                @endforeach
	        				</select>
						</td>
						<td>
							<button type="submit" class="btn btn-sx @if($dd->dept_actv=='N') btn-disabled @else btn-info @endif" 
							@if($dd->dept_actv=='N') disabled @endif>update</button>
	        				
						</td>
					</form>
						<td>
							<form action="{{route('activeDept',[$dd->id,$dd->dept_actv])}}" method="POST">
					            {{ csrf_field() }}
								<button class="btn btn-sx @if($dd->dept_actv=='N') btn-success @else btn-default @endif">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	        				</form>
						</td>
						<td>
							<form action="{{route('delDept',$dd->id)}}" method="POST">
					            {{ csrf_field() }}
					            {{ method_field('DELETE') }}
								<button class="btn btn-sx @if($dd->dept_actv=='N') btn-disabled @else btn-danger @endif" @if($dd->dept_actv=='N') disabled @endif>
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	        				</form>
						</td>
			@endforeach
			</tr>
		</tbody>
	</table>
					
	
	
@endsection