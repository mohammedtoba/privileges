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
    <!-- Radio -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/radio_css/css/radiobox.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/radio_checkbox.css')}}"/>
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
                        @if	(($MedS[0]->privtyp_id) == 1) bg-primary
		                    @elseif(($MedS[0]->privtyp_id) == 2) bg-warning
		                    @elseif(($MedS[0]->privtyp_id) == 3) bg-danger
		                    @endif">
                        	MedSilege type
                    	</div>
                        <div class="card-body text-center">
                             <h4>
                             	@if	(($MedS[0]->privtyp_id) == 1) Permenant
	                                @elseif(($MedS[0]->privtyp_id) == 2) Emergency
	                                @elseif(($MedS[0]->privtyp_id) == 3) Temporary
	                                @endif
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


			<div class="row">
	            <div class="col">
	                <div class="card m-t-35">
                		 <div class="card-header bg-white">
	                        <i class="fa fa-table"> </i> Privilege Form
	                    </div>
                    	 <div class="card-body">
                            <table id="example" class="table display table-hover" >
			<thead>
		     	<tr class="text-white" style="background: grey;"> 
			     	<th style="width: 25%;">Item</th> 
			     	<th style="width: 15%;">Staff opinion</th>
			    	<th style="width: 10%;">Staff comment</th>
			     	<th style="width: 15%;">Head opinion</th>
			    	<th style="width: 10%;">Head comment</th>
			     	<th style="width: 15%;">Committe opinion</th>
			    	<th style="width: 10%;">Committe comment</th>
				</tr> 
	     	</thead>
     		<tbody>
 			@foreach($groups as $s)
 				<tr>
 					<td colspan="7" id="table_scope" class="bg-primary text-center text-white" ><h4>{{$s->group_desc}}</h4></td>
 				</tr>
 				
				
				@foreach($temp as $t)
							
					@if($t->group_desc == $s->group_desc)
						<tr>
							<td>
								<input type="hidden" name="templdetno{{$t->templdetno}}" value="{{$t->templdetno}}">
								{{$t->templdet_desc}}
								

							</td>
							<td> 
								<div class="text-center">
                                    <div class="diff_colored_radio">
                                        <div class="btn-group d-inline-block" data-toggle="buttons">
                                        	@foreach($DecTyp as $dt)
                                            <label class="btn {{$parm=='S'?'': 'disabled'}} {{$dt->style}} {{old(('staff_deci_id'.$t->templdetno),$t->staff_deci_id)==$dt->id? 'active':''}}" data-toggle="tooltip" data-placement="top" title="{{$dt->dec_desc}}">
                                                <input type="radio"  name="staff_deci_id{{$t->templdetno}}" id="option{{$dt->id}}" value="{{$dt->id}}" >
                                                <span class="{{$dt->icon}}"></span>
                                            </label>
                                            @endforeach
        	                            </div>
                                    </div>
                                </div>
							</td>
							<td><input {{$parm=='S'?'': 'disabled'}} type="text" name="staff_comment{{$t->templdetno}}" value="{{$t->staff_comment}}"> 
								  </td>
							<td> 
								<!-- <select {{$parm=='H'?'': 'disabled'}} class="form-control" id="head_deci_id{{$t->templdetno}}" name="head_deci_id{{$t->templdetno}}">
		                                <option disabled selected value> -- select one  -- </option>
		                                @foreach($DecTyp as $dt)
		                                    <option  {{old(('head_deci_id'.$t->templdetno),$t->head_deci_id)==$dt->id? 'selected':''}}
		                                     value={{ $dt->id}} > {{$dt->dec_desc}}</option>
		                                @endforeach
		                        </select> -->
		                        <div class="text-center">
                                    <div class="diff_colored_radio">
                                        <div class="btn-group d-inline-block" data-toggle="buttons">
                                        	@foreach($DecTyp as $dt)
                                            <label class="btn {{$parm=='H'?'': 'disabled'}} {{$dt->style}} {{old(('head_deci_id'.$t->templdetno),$t->head_deci_id)==$dt->id? 'active':''}}" data-toggle="tooltip" data-placement="top" title="{{$dt->dec_desc}}">
                                                <input type="radio"  name="head_deci_id{{$t->templdetno}}" id="option{{$dt->id}}"  value="{{$dt->id}}" >
                                                <span class="{{$dt->icon}}"></span>
                                            </label>
                                            @endforeach
        	                            </div>
                                    </div>
                                </div>
							</td>
							<td>
								<input {{$parm=='H'?'': 'disabled'}} type="text"  name="head_comment{{$t->templdetno}}" value="{{$t->head_comment}}">
							  </td>
							<td>
								<!-- <select {{$parm=='C'?'': 'disabled'}} class="form-control" id="committe_deci_id{{$t->templdetno}}" name="committe_deci_id{{$t->templdetno}}">
		                                <option disabled selected value> -- select one  -- </option>
		                                @foreach($DecTyp as $dt)
		                                    <option  {{old('committe_deci_id')==$dt->id? 'selected':''}}
		                                     value={{ $dt->id}} > {{$dt->dec_desc}}</option>
		                                @endforeach
		                        </select> -->
		                        <div class="text-center">
                                    <div class="diff_colored_radio">
                                        <div class="btn-group d-inline-block" data-toggle="buttons">
                                        	@foreach($DecTyp as $dt)
                                            <label class="btn {{$parm=='C'?'': 'disabled'}} {{$dt->style}} {{old(('committe_deci_id'.$t->templdetno),$t->committe_deci_id)==$dt->id? 'active':''}}" data-toggle="tooltip" data-placement="top" title="{{$dt->dec_desc}}">
                                                <input type="radio"  name="committe_deci_id{{$t->templdetno}}" id="option{{$dt->id}}"  value="{{$dt->id}}" >
                                                <span class="{{$dt->icon}}"></span>
                                            </label>
                                            @endforeach
        	                            </div>
                                    </div>
                                </div>
					 		 </td>
					 		 <td>
					 		 	<input {{$parm=='C'?'': 'disabled'}} type="text"  name="committe_comment{{$t->templdetno}}" value="{{$t->committe_comment}}">
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



			<div class="row">
				<div class="col">
                	<div class="form-horizontal button_parent_section m-t-35">
							<button type="submit" class="btn btn-labeled btn-primary">
								<span class="btn-label"><i class="fa fa-save"></i></span>
						         Save
						    </button>

						    <button type="submit" class="btn btn-labeled btn-primary">
								<span class="btn-label"><i class="fa fa-save"></i></span>
						         @if($parm=='S')
						         		Submit
						         @elseif($parm=='H')
						         		Recommend
						         @else($parm=='C')
						         		Finalize
						         @endif
						    </button>


						   <!--  <a class="btn btn-close" href="#">Cancel</a> -->
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

    <script type="text/javascript" src="{{asset('assets/js/pages/advanced_tables.js')}}"></script>
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-slider/js/bootstrap-slider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/sliders.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/vendors/switchery/js/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/radio_checkbox.js')}}"></script>
    <!-- end of global scripts-->
@stop
