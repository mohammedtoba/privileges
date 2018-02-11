@extends('layouts/fixed_menu')
 
{{-- Page title --}}
@section('title')
    Apply for privileges
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}"/>
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}"/>
    <!-- slider styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/ion-rangeslider/css/ion.rangeSlider.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-slider/css/bootstrap-slider.min.css')}}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/slider_ion.css')}}"/>
    <!-- Dashbord 1ry key -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/c3/css/c3.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/switchery/css/switchery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/new_dashboard.css')}}"/>
    <!-- end of page level styles -->
@stop


{{-- Page content --}}
@section('content')

<div class="outer">
	<div class="inner bg-container">
		<form action="{{route('saveStfPriv')}}" method="post"    enctype="multipart/form-data" id="staff_privilege_form">
			{{ csrf_field() }}

			<div class="row">
				<div class="col-lg-4">
                    <div class="card" >
                        <div class="card-header bg-primary text-white">Medical staff
                        	<div class="float-right cards_content">
                    			<span class="fa-stack fa-sm">		
                    				<i class="fa fa-stethoscope fa-stack-2x fa-inverse sales_hover"></i>
								</span>
                			</div>
                        </div>
                        <div class="card-body">
                             <h4>{{$MedS[0]->full_name}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-header bg-mint text-white">Department
                    	</div>
                        <div class="card-body text-center">
                             <h4>{{$MedS[0]->dept_nam}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                	<div class="card">
                        <div class="card-header bg-mint text-white">Speciality
                    	</div>
                        <div class="card-body text-center">
                             <h4>{{$MedS[0]->spec_desc}}</h4>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-2">
                	<div class="card">
                        <div class="card-header bg-mint text-white">Category
                    	</div>
                        <div class="card-body text-center">
                             <h4>{{$MedS[0]->catg_desc}}</h4>
                        </div>
                    </div>
                </div>
				<div class="col-lg-2">
                    <div class="card">
                        <div class="card-header text-white
                        {{$PriV->type_desc_ar}}">
                        	Privilege type
                    	</div>
                        <div class="card-body text-center">
                             <h4>
                             	{{$PriV->type_desc}}
                             </h4>
                        </div>
                    </div>
                </div>
                
            </div>
 
		
			<input type="hidden" name="medstaff_id" value="{{$MedS[0]->id}}">
			<input type="hidden" name="templno" value="{{$temp[0]->templno}}">
			<input type="hidden" name="catgno" value="{{$MedS[0]->catgno}}">
			<input type="hidden" name="specno" value="{{$MedS[0]->specno}}">
			<input type="hidden" name="depno" value="{{$MedS[0]->depno}}">
			<input type="hidden" name="dept_nam" value="{{$MedS[0]->dept_nam}}">
			<input type="hidden" name="catg_desc" value="{{$MedS[0]->catg_desc}}">
			<input type="hidden" name="spec_desc" value="{{$MedS[0]->spec_desc}}">
			<input type="hidden" name="count" value="{{$c}}">
            <input type="hidden" name="privtyp_id" value="{{$PriV->id}}">
            
			<div class="row">
	            <div class="col">
	                <div class="card m-t-35">
                		 <div class="card-header bg-white">
	                        <i class="fa fa-table"> </i> Privilege Form
	                    </div>
                    	 <div class="card-body">
                            <table id="example" class="table display table-hover" >
                                <thead>
                                <tr style="background-color: grey;" class="text-white">		<th>Item</th> 
							     	<th>Request</th>
									<th>Comment</th>
                                </tr>
                                </thead>

					     		<tbody>
			     				@foreach($category as $c)
				 				<tr>
				 					<td colspan="3" id="table_scope" class="bg-primary text-center text-white">
                                        <h4>{{$c->group_desc}}</h4></td>
				 				</tr>
                                    @foreach($temp as $t)
													
									   @if($t->group_desc == $c->group_desc) 
										<tr>
											<td style="text-wrap:normal;">
												<input type="hidden" name="templdetno{{$t->templdetno}}" value="{{$t->templdetno}}">
												{{$t->templdet_desc}}

											</td>

											<td style="width: 10%">
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
								@endforeach 



	                    		</tbody>
							</table>
						</div>


 
					</div>
				</div>
			</div>

<!-- 
			<div class="row">
	            <div class="col">
	                <div class="card m-t-35">


					</div>
				</div>
			</div> -->



			<div class="row">
				<div class="col">
                	<div class="form-horizontal button_parent_section m-t-35">
							<button type="submit" class="btn btn-labeled btn-primary">
								<span class="btn-label"><i class="fa fa-save"></i></span>
						         Apply
						    </button>
						    <a class="btn btn-close" href="#">Cancel</a>
					</div>
				</div>
			</div>

		</form>
	</div> <!-- inner bg-container -->
</div> <!-- outer -->



@stop


{{--page level scripts--}}
@section('footer_scripts')
    <!-- plugin scripts -->
    <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <!-- end plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/advanced_tables.js')}}"></script>
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-slider/js/bootstrap-slider.min.js')}}"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/sliders.js')}}"></script>
    <!-- end of global scripts-->
@stop






