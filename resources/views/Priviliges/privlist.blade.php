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
        @foreach($depts as $dept)
        <div class="row">
        	<div class="col-12">
            	<div class="card m-t-25">
                        <div class="card-header bg-white">
            	           <i class="fa fa-table"> </i> 
                                List of privileges for {{$dept->dept_nam}}
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
        				    @foreach($LisT as $t)
                                @if($dept->id == $t->depno)
    						    <tr>
                                    <td> {{  $t->empno }} </td>
                                    <td> {{  $t->full_name }}  </td>
                                    <td> {{  $t->speciality->spec_desc }}  </td>
                                    <td> {{  $t->category->catg_desc }}  </td>
                                    <td> {{  $t->department->dept_nam }}   </td>
                                    <td> {{ $t->lastPriv? $t->lastPriv->id : ''}}    </td>
                                    <td> {{ $t->lastPriv? Carbon\Carbon::parse($t->lastPriv->committe_approv_dt)->diffForHumans() : ''}}    </td>
                                    <td>
                                        @if($t->lastPriv)
                                            <a class="btn btn-labeled btn-primary"  href="{{  route('showPriv' ,  $t->lastPriv->id )}}">
                                                <span class="btn-label"><i class="fa fa-eye"></i></span>
                                                 Show
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endif
            				@endforeach
                			</tbody>
        		        </table>
        	        </div>
        	   </div>
            </div>
        </div>
        @endforeach
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