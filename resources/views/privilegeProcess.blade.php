@extends('layouts.appLayout-sidebar')

@section('content')


<table class="table">
			    <thead>
			     	<tr> 
				     	 <th>ID</th> 
				     	 <th>Nationality</th> 
				     	 <th></th>
				     </tr> 
			     </thead>
			    <tbody>

			 		@foreach ($nat  as $var) 
				    	<tr> 
				    		<td>{{ $var->nat_no }}</td>
				    		<td>{{ $var->nat_desc }}</td> 
				    		<td>
				    			<a class="btn btn-info btn-sx" href="#"><span class="glyphicon glyphicon-align-right" aria-hidden="true"></span> show patient </a>
				    		</td>
				    	</tr> 
				    @endforeach
			    </tbody>
			  </table>
@endsection
