@extends ('layouts/fixed_menu')


{{-- Page title --}}
@section('title')
    Department setup
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jstree/css/style.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}" />
    <!--End of page level styles-->
@stop
    @section('content')


<form action="{{route('saveTT')}}" method="post"    enctype="multipart/form-data">
	{{ csrf_field() }}
	<h1>Evaluation template management</h1>
    <h2>Master Information</h2>
	<div class="container">
				<div class="row">
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('templno') ? ' has-error' : '' }}">
						     <label for="templno"  >Template No.</label>
							<input type="text" class="form-control" name="templno" 
								value=  "{{ old('templno') }}"   required autofocus>

						    @if ($errors->has('templno'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('templno') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
					<div class="col-md-9" > 
						<div class="form-group {{ $errors->has('templ_desc') ? ' has-error' : '' }}">
						     <label for="templ_desc"  >Template description</label>
							<input type="text" class="form-control" name="templ_desc" 
											     value= "{{ old('templ_desc') }}"   >

						    @if ($errors->has('templ_desc'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('templ_desc') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6" > 
						<div class="form-group {{ $errors->has('templ_desc_ar') ? ' has-error' : '' }}">
						     <label for="templ_desc_ar"  >Template description arabic</label>
							<input type="text" class="form-control" name="templ_desc_ar" 
											     value= "{{ old('templ_desc_ar') }}"   >

						    @if ($errors->has('templ_desc_ar'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('templ_desc_ar') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
				 
				  <div class="col-md-3" > 
						<div class="form-group {{ $errors->has('templ_score') ? ' has-error' : '' }}">
						     <label for="templ_score"  > Score </label>
							<input type="text" class="form-control" name="templ_score" 
											     value= "{{ old('templ_score') }}"   >

						    @if ($errors->has('templ_score'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('templ_score') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
				 

				  <div class="col-md-3" > 
						<div class="form-group {{ $errors->has('templ_actv') ? ' has-error' : '' }}">
							  
						    <label for="templ_actv"  > Status </label> 
							<select class="form-control" id="templ_actvtempl_actv" name="templ_actv" >
                                <option disabled selected value> -- select status -- </option>
          						<option value="A">Active</option>
 								<option value="I">Inactive</option>
			                </select>

						    @if ($errors->has('templ_actv'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('templ_actv') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>

				</div>
			</div>
 
	<div class="container"
        	<h2>Template details</h2>					    
							<!-- //create table -->
			<table border="1"   class="table details-table" >
							<!-- //create the row counter -->
							<?php $numberofrow = 5;?>
				 

			     <thead>
			     	<tr class="text-white" style="background: grey;"> 
				     	<th style="width: 5%;">Item #</th> 
				     	<th style="width: 40%;">Description</th>
				     	<th style="width: 20%;">Scope</th>
				     	<th style="width: 20%;">Category</th>
				    	<th style="width: 5%;">Score</th>
				     	<th style="width: 10%;">Status</th>
					</tr> 
		     	</thead>

			     <tbody>

							<!-- //create the for loop -->
							<?php for($counter = 1;$counter<=$numberofrow;$counter++){ ?>
							<!-- //create 1 row for repeating -->
							<tr>
									<td>
											<input class="form-control" name="templdetno{{$counter}}"  value={{$counter}}    ></input>
									</td> 
									<td>
											<input class="form-control" name="templdet_desc{{$counter}}"    ></input>
									 </td>
									 <td>
											<input class="form-control" name="scope{{$counter}}"    ></input>
									 </td>
									 <td>
											<input class="form-control" name="category{{$counter}}"    ></input>
									 </td>
									 
									 
									<td>
											<input class="form-control" name="templdet_score{{$counter}}" value = 5    ></input>
							 		 </td>

							  		<td>
							            <div>
	                                        <div class="diff_colored_radio">
	                                            <div class="btn-group d-inline-block" data-toggle="buttons">
	                                                <label class="btn btn-success  " data-toggle="tooltip" data-placement="top" title="Active">
	                                                    <input type="radio"  name="templdet_actv{{$counter}}" value="A"   >
	                                                    <span class="fa fa-stethoscope">&nbsp;Yes</span>
	                                                </label>
	                                                <label class="btn btn-secondary  " data-toggle="tooltip" data-placement="top" title="Inactive">
	                                                <input type="radio"  name="templdet_actv{{$counter}}" value="I"   >
	                                                <span class="fa fa-user">&nbsp;No</span>
	                                                </label>
	                                            </div>
	                                        </div>
	                                    </div>
							  		</td>
							</tr>
							<?php }?>
					</tbody>
			</table>
 			
	</div> <!-- container -->
	
<button type="submit" class="btn btn-primary">Save</button>
<button type="cancel" action="{{route('home')}}" class="btn btn-danger">  Cancel</button> 			
</form>

@stop
@section('footer_scripts')
<script type="text/javascript" src="{{asset('assets/vendors/jstree/js/jstree.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/jstree.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pluginjs/dataTables.tableTools.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.colReorder.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.rowReorder.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.scroller.min.js')}}"></script>
<!-- end of plugin scripts -->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
@stop