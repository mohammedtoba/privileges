@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    List for Evaluation
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jquery-validation-engine/css/validationEngine.jquery.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_validations.css')}}" />
    <!-- end of page level styles -->
@stop
{{-- Page content --}}
@section('content')
<header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-list"></i>
                        Medical Staff List for Evaluation
                    </h4>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Evaluaion</a>
                        </li>
                        <li class="active breadcrumb-item">list</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
<div class="outer">
    <div class="inner bg-container">

    
        <div class="row">
            <div class="col-12">
                <div class="card">               
            		<div class="card">
                		<div class="card-header bg-mint">
                            <i class="fa fa-table"></i> Pending evaluation
                        </div>
                    <div class="card-body">
                        @if ($errors->has('eval_typ'))
                        <span class="alert alert-warning">
                            <strong>{{ $errors->first('eval_typ') }}</strong>
                        </span> 
                        @endif
                    <table id="example3" class="display table table-stripped table-bordered table-hover text-center">
                        <thead>
                        <tr>
                        	<th style="width: 5%;">Employee #</th> 
					     	<th style="width: 20%;">Name</th>
					     	<th style="width: 10%;">Category</th>
					     	<th style="width: 10%;">Nationality</th>
					     	<th style="width: 10%;">Department</th>
                            <th style="width: 10%;">Last evaluation</th>
					     	<th style="width: 10%;">Last score</th>
					     	<th style="width: 25%;">Evaluate</th>
                            
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Employee #</th> 
					     	<th>Name</th>
					     	<th>Category</th>
					     	<th>Nationality</th>
					     	<th>Department</th>
                            <th>Last evaluation</th>
					     	<th></th>
					     	<th></th>
                        </tr>
                        </tfoot>
                        <tbody>
					 		@foreach($MedS as $key => $dd) 
						    	<tr 
						    	@if($dd->med_actv=='N')
						    	 style="color:grey;"
						    	 @endif
						    	 > 
						    		<td>{{$dd->empno}}</td>
						    		<td>{{$dd->full_name}}</td>
						    		<td>{{$dd->category? $dd->category->catg_desc : ''}}</td>
						    		<td>{{$dd->nationality? $dd->nationality->nat_desc : ''}}</td>
						    		<td>{{$dd->department? $dd->department->dept_nam : ''}}</td>
						    		<td>
                                        {{$dd->lastEval? $dd->lastEval->evaluationType : ''}}
                                        </br>
						    			{{$dd->lastEval? Carbon\Carbon::parse($dd->lastEval->head_sign_dat)->diffForHumans() : ''}} 
						    		</td>
                                    <td>{{$dd->lastEval? (number_format(($dd->lastEval->staff_score)*100,1).'%') : ''}}</td>
						    		<td>
						    			<form action="{{route('startEval')}}" method="POST" id="startEval" class="form-inline text-center">
									            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$dd->id}}">
								            <select class="form-control validate[required]" id="eval_typ" name="eval_typ" >
					                                <option disabled selected value> -- evaluation type -- </option>
					                                <option {{old('eval_typ')=="M"? 'selected':''}}  value="P">Propational</option>
												    <option {{old('eval_typ')=="A"? 'selected':''}} value="A">Annual</option>
												    <option {{old('eval_typ')=="F"? 'selected':''}} value="F">Focused</option>
											</select>
						    				<button class="btn btn-info"><span class="fa fa-file-o" aria-hidden="true"></span> Start</button>
						    			</form>
						    		</td>
					    		</tr>
							@endforeach
							</tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.inner -->
</div>
    <!-- /.outer -->
</div>

@endsection
 @section('footer_scripts')
<!--plugin scripts-->
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
<script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/jquery-validation-engine/js/jquery.validationEngine.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery-validation-engine/js/jquery.validationEngine-en.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/jquery-validation/js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/form.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/form_validation.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/startEval.js')}}"></script>
<!-- end of global scripts-->
@stop