@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Evaluation
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Tables styles-->
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
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/myslider.css')}}"/>
    <!-- Dashbord 1ry key -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/c3/css/c3.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/switchery/css/switchery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/new_dashboard.css')}}"/>
    <!-- Buttons -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/Buttons/css/buttons.min.css')}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/buttons.css')}}"/>
    <!-- end of page level styles -->
@stop


{{-- Page content --}}
@section('content')
<div class="outer">
	<div class="inner bg-container">	
		<form action="{{route('saveEval')}}" method="post"    enctype="multipart/form-data" id="evaluation_form">
		{{ csrf_field() }}
		
			<div class="row">
				<div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-mint text-white">Medical staff to be evaluated
                        	<div class="float-right cards_content">
                    			<span class="fa-stack fa-sm">		
                    				<i class="fa fa-stethoscope fa-stack-2x fa-inverse sales_hover"></i>
								</span>
                			</div>
                        </div>
                        <div class="card-body">
                             <h3>{{$MedS[0]->full_name}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-header bg-mint text-white">Department
                    	</div>
                        <div class="card-body text-center">
                             <h3>{{$MedS[0]->dept_nam}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                	<div class="card">
                        <div class="card-header bg-mint text-white">Category
                    	</div>
                        <div class="card-body text-center">
                             <h3>{{$MedS[0]->catg_desc}}</h3>
                        </div>
                    </div>
                </div>
				<div class="col-lg-2">
                    <div class="card">
                        <div class="card-header text-white
                        @if	(($eval->eval_typ) == 'P') bg-warning
		                    @elseif(($eval->eval_typ) == 'A') bg-primary
		                    @elseif(($eval->eval_typ) == 'F') bg-danger
		                    @endif">
                        	Evaluation type
                    	</div>
                        <div class="card-body text-center">
                             <h3>
                             	@if	(($eval->eval_typ) == 'P') Propational
	                                @elseif(($eval->eval_typ) == 'A') Annual
	                                @elseif(($eval->eval_typ) == 'F') Focused
	                                @endif
                             </h3>
                        </div>
                    </div>
                </div>
                
            </div>
            @if($final_score)
            <div class="row">
            	<div class="col-lg">
	            	<div class="bg-white m-t-35">
	            		<div class="card-header 
		                    @if($final_score>=0.85)bg-success
		                    @elseif(($final_score<0.85) && ($final_score>=0.7)) bg-primary 
		                    @elseif(($final_score<0.7) && ($final_score>=0.5)) bg-warning
		                    @elseif($final_score<0.5)bg-danger
		                    @endif 
		                    text-center">
		                        <h3 class="text-white">Total score 
		                        {{number_format(($final_score)*100,1).'%'}}</h3>
	                    </div>
	                    <div class="row">
	                    @foreach($score as $ss)
	                    <div class="col-sm-3 col-3 m-t-15" style="border-right: 1px solid rgba(0, 0, 0, 0.1);">
	                        <div class="@if($ss->average>=0.85)bg-success
		                    @elseif(($ss->average<0.85) && ($ss->average>=0.7)) bg-primary 
		                    @elseif(($ss->average<0.7) && ($ss->average>=0.5)) bg-warning
		                    @elseif($ss->average<0.5)bg-danger
		                    @endif card-header text-center">
	                            <h5 class="text-white">{{$ss->scope}}</h5>
	                        </div>
	                    </div>
	                    @endforeach    
	                    </div>
	                    <div class="row">
	                	@foreach($score as $ss)
	                        <div class="col-sm-3 col-3 text-center icons_border" >
	                            <div style="border-bottom: solid 3px @if($ss->average>=0.85) #009973
					                    @elseif(($ss->average<0.85) && ($ss->average>=0.7)) #1CA2FE 
					                    @elseif(($ss->average<0.7) && ($ss->average>=0.5)) #ff8a27
					                    @elseif($ss->average<0.5) #EA423E
					                    @endif;">
	                                <h2 class="m-t-20 @if($ss->average>=0.85) text-success
					                    @elseif(($ss->average<0.85) && ($ss->average>=0.7)) text-primary 
					                    @elseif(($ss->average<0.7) && ($ss->average>=0.5)) text-warning
					                    @elseif($ss->average<0.5)text-danger
					                    @endif"><span id="fb_count">{{number_format(($variable.$ss->average)*100,1)}}</span>%</h2>
	                            </div>
	                        </div>
	                    @endforeach
	                    </div>
	                </div>
	            </div>
            </div>
        	
            @endif
				

				
	    	<input type="hidden" name="count" value="{{$c}}">
			<input type="hidden" name="templno" value="{{$temp[0]->templno}}">
			<input type="hidden" name="medstaff_id" value="{{$MedS[0]->id}}">
			<input type="hidden" name="eval_id" value="{{$eval->id}}">
			<div class="row">
	            <div class="col">
	                <div class="card m-t-35">
	                    <div class="card-header bg-white">
	                        <i class="fa fa-check"> </i> Evaluation Form
	                    </div>
	                    <div class="card-body">
                            <table id="example" class="table display table-hover" >
                                <thead>
                                <tr style="background-color: grey;" class="text-white">
                                    <th>Category</th> 
							     	<th>Item</th> 
							     	<th>Score</th>
                                </tr>
                                </thead>

					     		<tbody>
					 			@foreach($scope as $s)
					 				<tr>
					 					<td colspan="3" class="btn-primary" >
					 						{{$s->scope}}
				 						</td>
					 				</tr>
									@foreach($category as $c)
										@if($c->scope == $s->scope)
										<td rowspan="{{($c->count)+1}}" class="btn-outline-primary">{{$c->category}}</td>
											@foreach($temp as $t)
												
												@if($t->category == $c->category)
												<tr>
													<td style="text-wrap:normal;">
														<input type="hidden" name="templdetno{{$t->templdetno}}" value="{{$t->templdetno}}">
														<input type="hidden" name="templdet_score{{$t->templdetno}}" value="{{$t->templdet_score}}">
														{{$t->templdet_desc}}
															
													</td>
													<td style="width: 10%">
														<div class="slidecontainer">
						   									@if($eval->staff_score)
						   									<input type="range" min="1" max="{{$t->templdet_score}}"  class="slider"  name="staff_score{{$t->templdetno}}" value="{{old($t->templdetno,$t->staff_score)}}">
						   									@else
						   									<input type="range" min="1" max="{{$t->templdet_score}}"  class="slider"  name="staff_score{{$t->templdetno}}" value="{{old($t->templdetno)}}">
						   									@endif	
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
								        name="recomnd_oppor" "{{ $errors->has('recomnd_oppor') ? ' has-error' : '' }} 
								         >{{old('recomnd_oppor',$eval->recomnd_oppor)}}</textarea>
								         @if ($errors->has('recomnd_oppor'))
										    <span class="help-block">
										        <strong>{{ $errors->first('recomnd_oppor') }}</strong>
										    </span> 
											@endif
									    </div>


										<div class="col-lg-4 input_field_sections">
									        <h5>Goals</h5>
									        <textarea id="autosize" class="form-control" cols="50" rows="5"
									        name="recomnd_goals" {{ $errors->has('recomnd_oppor') ? ' has-error' : '' }}>{{ old('recomnd_goals',$eval->recomnd_goals)}}</textarea>
									        @if ($errors->has('recomnd_goals'))
											    <span class="help-block">
											        <strong>{{ $errors->first('recomnd_goals') }}</strong>
											    </span> 
												@endif
									    </div>
										
										<div class="col-lg-4 input_field_sections">
									        <h5>Comments</h5>
									        <textarea id="autosize" class="form-control" cols="50" rows="5"
									        name="head_comment">{{ old('head_comment',$eval->head_comment)}}</textarea>
									        @if ($errors->has('head_comment'))
											    <span class="help-block">
											        <strong>{{ $errors->first('head_comment') }}</strong>
											    </span> 
												@endif
									    </div>
	                                </div>
	                            </div>
	                            	
	                        </div>
	                    </div>
	                </div>
	        </div>
	            <!--END TEXT INPUT FIELD-->	
			<div class="row">
				<div class="col">
                		<div class="form-horizontal button_parent_section m-t-35">
							<button type="submit" class="btn btn-labeled btn-primary">
								<span class="btn-label"><i class="fa fa-save"></i></span>
						         save
						    </button>
					    
						    
						    <a href="{{route('delEval',$eval->id)}}" class="btn btn-labeled btn-danger">
						        <span class="btn-label"><i class="fa fa-close"></i></span> Cancel</a>
					        <a href="{{route('finalizeEval',$eval->id)}}" class="btn btn-labeled {{($final_score)?'btn-success':'btn-disabled'}}">
						        <span class="btn-label"><i class="fa fa-check"></i></span> finalize</a>
						    

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