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
    <!-- Buttonds-->
   <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/Buttons/css/buttons.min.css')}}"/>
   <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/buttons.css')}}"/>

    <!-- end of page level styles -->
@stop

 
{{-- Page content --}}
@section('content')

<div class="outer">
	<div class="inner bg-container">
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
            <h4>{{$priv[0]->medicalstaff->full_name}}</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card">
          <div class="card-header bg-mint text-white">Department
          </div>
          <div class="card-body text-center">
            <h4>{{$priv[0]->medicalstaff->department->dept_nam}}</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card">
          <div class="card-header bg-mint text-white">Speciality
          </div>
          <div class="card-body text-center">
            <h4>{{$priv[0]->medicalstaff->speciality->spec_desc}}</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card">
          <div class="card-header bg-mint text-white">Category
          </div>
          <div class="card-body text-center">
            <h4>{{$priv[0]->medicalstaff->category->catg_desc}}</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card">
          <div class="card-header text-white {{$priv[0]->privType->type_desc_ar}}">
            Privilege type
          </div>
          <div class="card-body text-center">
            <h4>{{$priv[0]->privType->type_desc}}</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card m-t-35">
          <div class="card-header bg-white">
            <i class="fa fa-table"> </i> Privilege Form
          </div>
          <div class="card-body">
            <form action=" @if($parm=='S') {{route('savePrivS')}}   
                @elseif($parm=='H')  {{route('savePrivH')}}  
                @else($parm=='C')  {{route('savePrivC')}}    
                @endif 
                " id="popup-validation" method="post"    enctype="multipart/form-data" id="privilege">
            {{ csrf_field() }}
            <input type="hidden" name="staffpriv_id" value="{{$priv[0]->id}}">
            <input type="hidden" name="medstaff_id" value="{{$priv[0]->medicalstaff->id}}">
            <input type="hidden" name="templno" value="{{$priv[0]->templno}}">
            <input type="hidden" name="catgno" value="{{$priv[0]->medicalstaff->category->catgno}}">
            <input type="hidden" name="specno" value="{{$priv[0]->medicalstaff->speciality->specno}}">
            <input type="hidden" name="depno" value="{{$priv[0]->medicalstaff->department->depno}}">
            <input type="hidden" name="dept_nam" value="{{$priv[0]->medicalstaff->department->dept_nam}}">
            <input type="hidden" name="catg_desc" value="{{$priv[0]->medicalstaff->category->catg_desc}}">
            <input type="hidden" name="spec_desc" value="{{$priv[0]->medicalstaff->speciality->spec_desc}}">
            <input type="hidden" name="count" value="{{$c}}">
            <table  class="table display table-hover table-bordered" >
        			<thead>
      		     	<tr class="text-white text-center" style="background: grey;"> 
      			     	<th style="width: 25%;">Item</th> 
                    @if(($parm =='S') )
      			     	<th style="width: 15%;">Staff request</th>
      			    	<th style="width: 10%;">Staff comment</th>
                    @endif
                    @if(($parm =='H') || ($parm =='C') || ($parm == 'SH'))
                  <th style="width: 15%;">Staff request</th>
                    @endif
                    @if($parm =='H')
      			     	<th style="width: 15%;"><span data-toggle="tooltip" data-placement="top" title="Head of department">HOD</span> opinion</th>
      			    	<th style="width: 10%;"><span data-toggle="tooltip" data-placement="top" title="Head of department">HOD</span> comment</th>
                    @endif
                    @if(( $parm =='C') || ($parm == 'SH'))
                  <th style="width: 15%;"><span data-toggle="tooltip" data-placement="top" title="Head of department">HOD</span> recomendation</th>
                    @endif
                    @if($parm == 'C')
      			     	<th style="width: 15%;">Committe decision</th>
      			    	<th style="width: 10%;">Committe comment</th>
                    @endif
                    @if($parm == 'SH')
                  <th style="width: 15%;">Committee decision</th>
                    @endif
      				</tr> 
    	     	</thead>
         		<tbody>
       			@foreach($groups as $s)
       				<tr>
       					<td colspan="8" id="table_scope" class="bg-primary text-center text-white" ><h4>{{$s->group_desc}}</h4></td>
       				</tr>	
      				@foreach($temp as $t)
                @if($t->group_desc == $s->group_desc)
  						<tr>
  							<td>
  								<input type="hidden" name="templdetno{{$t->templdetno}}" value="{{$t->templdetno}}">
          								{{$t->templdet_desc}}
  							</td>
                  @if($parm =='S')
  							<td>
                  <div class="form-inline" style="float: none;margin: 0 auto;">
                    @foreach($PriV as $dt)
                       <label class=" {{$dt->text }} " data-toggle="tooltip" data-placement="top" title="{{$dt->dec_desc}}">
                          <input type="radio"  name="staff_deci_id{{$t->templdetno}}" value="{{$dt->id}}" @if($t->itemScore){{$t->itemScore->staff_deci_id ==$dt->id? 'checked':''}} @else {{old('staff_deci_id'.$t->templdetno) ==$dt->id? 'checked':''}}
                       @endif>
                          &nbsp;&nbsp;<span class="{{$dt->icon}} fa-2x"></span>
                       </label>&nbsp;&nbsp;&nbsp;&nbsp;
                    @endforeach
                 </div>
                </td>
  							<td>
                   <input {{$parm=='S'?'': 'disabled'}} type="text" name="staff_comment{{$t->templdetno}}" value="{{$t->itemScore? $t->itemScore->staff_comment : ''}}"> 
  					    </td>
                  @endif
    							@if(($parm =='H') || ($parm =='C') || ($parm == 'SH'))
                <td>
                @foreach($PriV as $dt)
                @if($t->itemScore->staff_deci_id==$dt->id)
                <span class="btn {{$dt->style.' '.$dt->icon}} " >  </span>{{$dt->dec_desc}}
                @endif
                @endforeach
                @if($t->itemScore->staff_comment)
                </br>
                <i><strong>Comment: </strong>{{$t->itemScore->staff_comment}}</i>
                @endif
                </td>
                  @endif
                  @if($parm =='H')
                <td>
                  <div class="form-inline" style="float: none;margin: 0 auto;">
                    @foreach($PriV as $dt)
                       <label class=" {{$dt->text }} " data-toggle="tooltip" data-placement="top" title="{{$dt->dec_desc}}">
                          <input type="radio"  name="head_deci_id{{$t->templdetno}}" value="{{$dt->id}}" @if($t->itemScore){{$t->itemScore->head_deci_id ==$dt->id? 'checked':''}} @else {{old('head_deci_id'.$t->templdetno) ==$dt->id? 'checked':''}}
                       @endif>
                          &nbsp;&nbsp;<span class="{{$dt->icon}} fa-2x"></span>
                       </label>&nbsp;&nbsp;&nbsp;&nbsp;
                   @endforeach
                  </div>
                                                           
               </td>
  							<td>
  								<input  type="text"  name="head_comment{{$t->templdetno}}" value="{{$t->itemScore->head_comment}}">
  					    </td>
						      @endif
                  @if(($parm =='C') || ($parm == 'SH'))
                <td>
                   @foreach($PriV as $dt)
                   @if($t->itemScore->head_deci_id==$dt->id)
                   <span class="btn {{$dt->style.' '.$dt->icon}} " >  </span>{{$dt->dec_desc}}
                   @endif
                   @endforeach
                   @if($t->itemScore->head_comment)
                   </br>
                   <i><strong>Comment: </strong>{{$t->itemScore->head_comment}}</i>
                   @endif
                </td>
                  @endif
                  @if($parm == 'C')
                <td>
                   <div class="form-inline" style="float: none;margin: 0 auto;">
                      @foreach($PriV as $dt)
                         <label class=" {{$dt->text }} " data-toggle="tooltip" data-placement="top" title="{{$dt->dec_desc}}">
                            <input type="radio"  name="committe_deci_id{{$t->templdetno}}" value="{{$dt->id}}" @if($t->itemScore){{$t->itemScore->committe_deci_id ==$dt->id? 'checked':''}} @else {{old('committe_deci_id'.$t->templdetno) ==$dt->id? 'checked':''}}
                         @endif>
                            &nbsp;&nbsp;<span class="{{$dt->icon}} fa-2x"></span>
                         </label>&nbsp;&nbsp;&nbsp;&nbsp;
                      @endforeach
                    </div>
                </td>
                <td>
                   	<input {{$parm=='C'?'': 'disabled'}} type="text"  name="committe_comment{{$t->templdetno}}" value="{{$t->itemScore? $t->itemScore->committe_comment : ''}}">
                </td>
                      @endif
                      @if($parm == 'SH')
                <td>
                  @foreach($PriV as $dt)
                  @if($t->itemScore->committe_deci_id==$dt->id)
                  <span class="btn {{$dt->style.' '.$dt->icon}} " >  </span>{{$dt->dec_desc}}
                  @endif
                  @endforeach
                  @if($t->itemScore->committe_comment)
                  </br>
                  <i><strong>Comment: </strong>{{$t->itemScore->committe_comment}}</i>
                  @endif
                </td>
                  @endif                                    
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
      @if($parm != 'SH')
    	<div class="col">
      	<div class="form-horizontal button_parent_section m-t-35">
    			<button type="submit" class="btn btn-labeled btn-info">
            <span class="btn-label"><i class="fa fa-save"></i></span>
    			         Save
    	    </button>
          <button type="submit" class="btn btn-labeled btn-mint" formaction="@if($parm=='S') {{route('submitPrivS'  )}}   
           @elseif($parm=='H')  {{route('submitPrivH'  )}}  
           @else($parm=='C')  {{route('submitPrivC' )}}    
           @endif ">
           <span class="btn-label"><i class="fa fa-send"></i></span>
                        @if($parm=='S')
                              Submit
                        @elseif($parm=='H')
                              Recommend
                        @else($parm=='C')
                              Finalize
                        @endif
          </button>
        </div>
      </div>
      @endif
    </form>
    </div>
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
    <script type="text/javascript" src="{{asset('assets/vendors/jquery-validation-engine/js/jquery.validationEngine.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery-validation-engine/js/jquery.validationEngine-en.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery-validation/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datetimepicker/js/DateTimePicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>

    <!--Plugin scripts-->
	<script type="text/javascript" src="{{asset('assets/vendors/switchery/js/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/radio_checkbox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/form.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/form_validation.js')}}"></script>

    <!-- end of global scripts-->
@stop
