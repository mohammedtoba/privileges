@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Evaluation
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
		<form action="{{route('saveEval')}}" method="post"    enctype="multipart/form-data" id="evaluation_form">
		{{ csrf_field() }}
		
			<div class="row">
				<div class="col-xl-6 col-lg-7 col-12">
					<div class="bg-primary top_cards">
						<div class="row  icon_margin_left">
							<div class="col-lg-7 col-7 icon_padd_left">
	                            <div class="float-right cards_content">
									<span class="card_description" id="sales_count">Name</span>
	                                <br>
	                                <span class="number_val">{{$MedS->full_name}}</span>
	                            </div>
	                        </div>
	                        <div class="col-lg-5 col-5 icon_padd_right">
	                            <div class="float-right cards_content">
	                                <span class="fa-stack fa-sm">					
	                                	<i class="fa fa-stethoscope fa-stack-2x fa-inverse sales_hover"></i>
									</span>
	                            </div>
	                        </div>
	                    </div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-7 col-12">
					<div class="card">
			            <div class="card-header bg-primary text-white">
			                Employee name
			            </div>
			            <div class="card-body">
			                <ul class="Browser_stats_ul">
			                    <li><strong>Name: </strong>{{$MedS->full_name}}</li>
			                    	<hr>
			                    
			                </ul>
			            </div>
		            </div>
		        </div>
	        </div>
	    	<input type="hidden" name="count" value="{{$c}}">
			<input type="hidden" name="templno" value="{{$temp[0]->templno}}">
			<input type="hidden" name="medstaff_id" value="{{$MedS->id}}">
			<input type="hidden" name="eval_id" value="{{$eval->id}}">
			<div class="row">
	            <div class="col">
	                <div class="card">
	                    <div class="card-header bg-white">
	                        <i class="fa fa-table"> </i> Evaluation
	                    </div>
	                    <div class="card-body">
	                        <div class="m-t-35">
	                            <table id="example" class="table display" >
	                                <thead>
	                                <tr class="bg-primary text-white">
	                                    <th>Category</th> 
								     	<th>Item</th> 
								     	<th>Score</th>
	                                </tr>
	                                </thead>

						     		<tbody>
						 			@foreach($scope as $s)
						 				<tr>
						 					<td colspan="3" class="btn-danger" ><h4>{{$s->scope}}</h4></td>
						 				</tr>
										@foreach($category as $c)
											@if($c->scope == $s->scope)
											<td rowspan="{{($c->count)+1}}" class="btn-outline-success">{{$c->category}}</td>
												@foreach($temp as $t)
													
													@if($t->category == $c->category)
													<tr>
														<td style="text-wrap:normal;">
															<input type="hidden" name="templdetno{{$t->templdetno}}" value="{{$t->templdetno}}">
															<input type="hidden" name="templdet_score{{$t->templdetno}}" value="{{$t->templdet_score}}">
															{{$t->templdet_desc}}
																
														</td>
														<td>
															<div class="slidecontainer">
							   									<input type="range" min="1" max="{{$t->templdet_score}}"  class="slider"  name="staff_score{{$t->templdetno}}" value="{{old('staff_score'.$t->templdetno,$t->templdet_score)}}">	
															</div>
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
						</div>
					</div>
	            </div>
	        </div>
	    	<div class="row">
	                <div class="col">
	                    <div class="card input_text_fields m-t-35">
	                        <div class="card-header bg-white">
								Additional input
	                        </div>
	                        <div class="card-body">
	                            
	                            <div class="form-horizontal">
	                                <div class="row">
	                                    <div class="col-lg-4 input_field_sections">
								        <h5>Recommendation</h5>
								        <textarea id="autosize" class="form-control" cols="50" rows="5"
								        name="recomnd_oppor" value=	@if( $eval->recomnd_oppor )
											     			"{{$eval->recomnd_oppor}}"
											     		@else	
											     			"{{ old('recomnd_oppor') }}" 
											     		@endif></textarea>
								    </div>


									<div class="col-lg-4 input_field_sections">
								        <h5>Goals</h5>
								        <textarea id="autosize" class="form-control" cols="50" rows="5"
								        name="recomnd_goals" value=	@if( $eval->recomnd_goals )
									    "{{$eval->recomnd_goals}}" @else"{{ old('recomnd_goals') }}" 
										@endif></textarea>
								    </div>
									
									<div class="col-lg-4 input_field_sections">
								        <h5>Comments</h5>
								        <textarea id="autosize" class="form-control" cols="50" rows="5"
								        name="head_comment" value=	@if( $eval->head_comment )
										"{{$eval->head_comment}}" @else	"{{ old('head_comment') }}" 
										@endif></textarea>
								    </div>
	                                </div>
	                            </div>
	                            	@if ($errors->has('recomnd_goals'))
								    <span class="alert alert-warning">
								        <strong>{{ $errors->first('recomnd_goals') }}</strong>
								    </span> 
									@endif
	                        </div>
	                    </div>
	                </div>
	        </div>
	            <!--END TEXT INPUT FIELD-->	
			<div class="row">
				<div class="col">
	                	<div class="form-horizontal" style="padding-top: 20px;">
							<button type="submit" class="btn btn-labeled btn-success">
						        <span class="btn-label"><i class="fa fa-check"></i></span>
						        save
						    </button>
						    <a href="{{ route('delEval',$eval->id) }}" class="btn btn-labeled btn-danger">
						        <span class="btn-label"><i class="fa fa-close"></i></span>Cancel
						    </a>
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