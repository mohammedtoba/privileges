@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    My Requests
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
<div class="outer">
	<div class="inner bg-container">
		 
			{{ csrf_field() }}

        <div class="row">
        	<div class="col-12">
            	<div class="card">
                        <div class="card-header bg-white">
            	           <i class="fa fa-table"> </i> 
                                @if($ParM=='S')
                                        My Privilege Requests    
                                 @elseif($ParM=='H')
                                        My Staff
                                 @else($ParM=='C')
                                        Pending Privileges 
                                 @endif
            	       </div>
                    <div class="card-body">
                        <table id="example3" class="display table table-stripped table-bordered table-hover text-center">
                            <thead>
                		     	<tr class="text-white" style="background: grey;"> 
            			     	<th style="width: 15%;">Employee #</th> 
            			     	<th style="width: 15%;">Employee Name</th>
            			    	<th style="width: 10%;">Speciality</th>
            			     	<th style="width: 15%;">Category</th>
            			    	<th style="width: 10%;">Department</th>
            			     	<th style="width: 15%;">Request ID</th>
            			    	<th style="width: 10%;">Request Type</th>
                                <th style="width: 10%;">Action</th>
                				</tr> 
                            </thead>
                            <tfoot>
                                <tr> 
                                    <th style="width: 15%;">Employee #</th> 
                                    <th style="width: 15%;">Employee Name</th>
                                    <th style="width: 10%;">Speciality</th>
                                    <th style="width: 15%;">Category</th>
                                    <th style="width: 10%;">Department</th>
                                    <th style="width: 5%;">Request ID</th>
                                    <th style="width: 10%;">Request Type</th>
                                    <th style="width: 10%;">Action</th>
                                </tr> 
                            </tfoot>
                     		<tbody>                                 			
            				@if($ParM=='S')
                                @foreach($LisT as $t)
                                    <tr>
                                        <td> {{  $t->medicalstaff->empno }} </td>
                                        <td> {{  $t->medicalstaff->full_name }}  </td>
                                        <td> {{  $t->medicalstaff->speciality->spec_desc }}  </td>
                                        <td> {{  $t->medicalstaff->category->catg_desc }}  </td>
                                        <td> {{  $t->medicalstaff->department->dept_nam }}   </td>
                                        <td> {{  $t->id }}    </td>
                                        <td> {{  Carbon\Carbon::parse($t->created_at)->diffForHumans()}}    </td>
                                        <td>
                                            <a class="btn btn-labeled btn-primary" href="
                                            @if($ParM=='S')
                                                    {{route('apply' ,  $t->id )}}   
                                            @endif">
                                                <span class="btn-label"><i class="fa fa-pencil"></i></span>
                                                @if($ParM=='S')
                                                        Edit   
                                                @endif
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach($LisT as $t)
        						    <tr>
                                        <td> {{  $t->empno }} </td>
                                        <td> {{  $t->full_name }}  </td>
                                        <td> {{  $t->speciality->spec_desc }}  </td>
                                        <td> {{  $t->category->catg_desc }}  </td>
                                        <td> {{  $t->department->dept_nam }}   </td>
                                        <td> {{  $t->lastPriv->id }}    </td>
                                        <td> {{  Carbon\Carbon::parse($t->lastPriv->created_at)->diffForHumans()}}    </td>
                                        <td>
                                            <a class="btn btn-labeled btn-primary" href="
                                            @if($ParM=='S')
                                                    {{route('apply' ,  $t->lastPriv->id )}}   
                                             @elseif($ParM=='H')
                                                    {{route('recommend' ,  $t->lastPriv->id )}}
                                             @else($ParM=='C')
                                                    {{route('finalize' ,  $t->lastPriv->id )}} 
                                             @endif">
                                                <span class="btn-label"><i class="fa fa-pencil"></i></span>
                                                 @if($ParM=='H')
                                                        Review
                                                 @else($ParM=='C')
                                                        Discuss 
                                                 @endif
                                            </a>
                                        </td>
                                    </tr>
                				@endforeach
                            @endif
                			</tbody>
        		        </table>
        	        </div>
        	   </div>
            </div>
        </div>

		<div class="row">
			<div class="col">
            	<div class="form-horizontal button_parent_section m-t-35">
                    @if(  $ParM =='S'   )
                        <a class="btn btn-labeled btn-primary" href="{{route('apply',1)}}">
                        <span class="btn-label"><i class="fa fa-save"></i></span>Apply for privilege
                        </a>
                    @endif    
				</div>
			</div>
		</div>
	</div> <!-- inner bg-container -->
</div> <!-- outer -->

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