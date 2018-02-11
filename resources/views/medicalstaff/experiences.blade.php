@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Experiences form
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
     <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/general_components.css')}}"/>
     <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/swiper/css/swiper.min.css')}}"/>
    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
     <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jquery-validation-engine/css/validationEngine.jquery.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datepicker/css/bootstrap-datepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datetimepicker/css/DateTimePicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_validations.css')}}" />
    <!-- Date Picker -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/inputlimiter/css/jquery.inputlimiter.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datetimepicker/css/DateTimePicker.min.css')}}" />
    <!-- Buttons -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/Buttons/css/buttons.min.css')}}"/> 
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/buttons.css')}}"/>
    <!-- file upload -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fileinput/css/fileinput.min.css')}}"/>
@stop


{{-- Page content --}}
@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-lg-6 col-sm-4">
                <h4 class="nav_top_align">
                    <i class="fa fa-stethoscope"></i>
                    Experiences profile
                </h4>
            </div>
            <div class="col-lg-6 col-sm-8">
                <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Medical staff</a>
                    </li>
                    <li class="breadcrumb-item active">Experiences</li>
                </ol>
            </div>
        </div>
    </div>
</header>
<div class="outer form_wizzards">
    <div class="inner bg-container">
    	<div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-mint">
                        <i class="fa fa-mortar-board"></i>
                        Add an experience
                    </div>

                    <div class="card-body ">
                        <form action="{{route('saveExper')}}" method="post" class="login_validator" id="form_block_validator" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                            <div class="form-group row">

                                	<input name="user_id" class="col-md-12" type="hidden" value="{{ $MedS->id }}">
                                	
	                                <div class="col-lg-3 form-group">
	                                    <label for="exper_position" class="col-form-label">Position*</label>
	                                    <input type="text" id="exper_position" name="exper_position" class="form-control" value= "{{old('exper_position')}}" required>
	                                </div>
	                               
									<div class="col-lg-3 form-group">
                                        <label for="exper_startdt"  >Start date</label>
                                        <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
                                            <div class="input-group input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                                            
                                            <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="exper_startdt" value="{{old('exper_startdt')?old('exper_startdt'):''}}">
                                                <span class="input-group-addon add-on">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

									<div class="col-lg-3 form-group">
                                        <label for="exper_enddt"  >End date</label>
                                        <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
                                            <div class="input-group input-append date" id="dp4" data-date-format="dd-mm-yyyy">
                                            
                                            <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="exper_enddt" value="{{old('exper_enddt')?old('exper_enddt'):''}}">
                                                <span class="input-group-addon add-on">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-3 form-group">
	                                    <label for="exper_country" class="col-form-label">Country*</label>
	                                    <input type="text" id="exper_country" name="exper_country" class="form-control" value= "{{old('exper_country')}}" required>
	                                </div>
									<div class="col-lg-3 form-group">
	                                    <label for="exper_workplace" class="col-form-label">Workplace*</label>
	                                    <input type="text" id="exper_workplace" name="exper_workplace" class="form-control" value= "{{old('exper_workplace')}}" required>
	                                </div>
									
	                                <div class="col-lg-3 form-group">
	                                    <label for="exper_phone" class="col-form-label">Contact telephone</label>
	                                    <input type="text" id="exper_phone" name="exper_phone" class="form-control" value= "{{old('exper_phone')}}">
	                                </div>
	                                <div class="col-lg-3 form-group">
	                                    <label for="exper_email" class="col-form-label">Contact email</label>
	                                    <input type="email" id="exper_email" name="exper_email" class="form-control" value= "{{old('exper_email')}}">
	                                </div>
	                                <div class="col-lg-3 form-group">
	                                    <label for="exper_fax" class="col-form-label">Contact fax</label>
	                                    <input type="text" id="exper_fax" name="exper_fax" class="form-control" value= "{{old('exper_fax')}}">
	                                </div>
				    				<div class="col-lg-3 form-group">
				    					
										<label for="fileToUpload" class="col-form-label">Upload an experience certificate</label>
										<div class="input-group file-caption-main">
											<div class="file-caption form-control kv-fileinput-caption">
	  											<span class="file-caption-icon"></span>
										     	<input class="file-caption-name" placeholder="Select files...">
											</div>
											<div class="btn btn-mint btn-file">
												<i class="fa fa-folder-open"></i>  <span class="hidden-xs">Browse …</span>
												<input id="fileToUpload" name="fileToUpload" type="file">
											</div>
										</div>
					    			</div>
									<div class="col-lg-9 form-group">
	                                    <label for="exper_notes" class="col-form-label">Additional notes</label>
										<input name="exper_notes" class="form-control" type="text" value= 	"{{ old('exper_notes') }}">
									</div>
									<div class="col-lg-1 form-group">
										<button type="submit" class="btn btn-labeled btn-mint " >
				                            <span class="btn-label">
				                                <i class="fa fa-plus"></i>
				                            </span>Add
		                                </button>
									</div>
							</div><!-- Form row -->	
						</form>	
					</div>
				</div>
			</div>
		</div>
		<div>
			<p>
			 	@if ($errors->any())
		 		<div class="container">
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
		    	</div>
				@endif
			</p>
		</div>
		<div class="row">
            <div class="col">
				<div class="card m-t-35">
                    <div class="card-header bg-success text-white">
                        <i class="fa fa-mortar-board"></i>
                        List of experiences
                    </div>
                    <div class="card-body ">
                        <div class="card-body">
                            <div class="m-t-10 accordian_alignment">
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach ($ExperCour as $key=>$ss)
                                    <div class="card m-t-20">
                                        <div class="card-header bg-white" role="tab" id="title-{{$key}}">
                                            <a class="collapsed accordion-section-title" data-toggle="collapse" data-parent="#accordion" href="#card-data-{{$key}}" aria-expanded="false">
                                               {{ $ss->exper_position.' from '.$ss->exper_startdt .' to '. $ss->exper_enddt 
                                               .' in '.$ss->exper_workplace }}
                                               
                                              <i class="fa fa-plus float-right m-t-5"></i>
                                            </a>
                                        </div>
                                        <div id="card-data-{{$key}}" class="card-collapse collapse">
                                            <div class="card-body m-t-20">
                                            	<form action="{{route('editExper',$ss->id)}}" method="post" class="login_validator" id="form_block_validator" enctype="multipart/form-data">
						                        	{{ csrf_field() }}
						                            <div class="form-group row">
						                                	<input name="user_id" class="col-md-12" type="hidden" value="{{ $MedS->id }}">
															<div class="col-lg-3 form-group">
						                                    <label for="exper_position" class="col-form-label">Position*</label>
						                                    <input type="text" id="exper_position" name="exper_position" class="form-control" value= "{{$ss->exper_position}}" required>
						                                </div>

														<div class="col-lg-3 form-group">
					                                        <label for="exper_startdt"  >Start date</label>
					                                        <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
					                                            <div class="input-group input-append date" id="dp2" data-date-format="dd-mm-yyyy">
					                                            
					                                            <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="exper_startdt" value="{{old('exper_startdt')?old('exper_startdt'): $ss->exper_startdt}}">
					                                                <span class="input-group-addon add-on">
					                                                    <i class="fa fa-calendar"></i>
					                                                </span>
					                                            </div>
					                                        </div>
					                                    </div>


														<div class="col-lg-3 form-group">
					                                        <label for="exper_enddt"  >End date</label>
					                                        <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
					                                            <div class="input-group input-append date" id="dp4" data-date-format="dd-mm-yyyy">
					                                            
					                                            <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="exper_enddt" value="{{old('exper_enddt')?old('exper_enddt'):$ss->exper_enddt}}">
					                                                <span class="input-group-addon add-on">
					                                                    <i class="fa fa-calendar"></i>
					                                                </span>
					                                            </div>
					                                        </div>
					                                    </div>



														<div class="col-lg-3 form-group">
						                                    <label for="exper_country" class="col-form-label">Country*</label>
						                                    <input type="text" id="exper_country" name="exper_country" class="form-control" value= "{{$ss->exper_country}}" required>
						                                </div>
														<div class="col-lg-3 form-group">
						                                    <label for="exper_workplace" class="col-form-label">Workplace*</label>
						                                    <input type="text" id="exper_workplace" name="exper_workplace" class="form-control" value= "{{$ss->exper_workplace}}" required>
						                                </div>
														
						                                <div class="col-lg-3 form-group">
						                                    <label for="exper_phone" class="col-form-label">Contact telephone</label>
						                                    <input type="text" id="exper_phone" name="exper_phone" class="form-control" value= "{{$ss->exper_phone}}">
						                                </div>
						                                <div class="col-lg-3 form-group">
						                                    <label for="exper_email" class="col-form-label">Contact email</label>
						                                    <input type="email" id="exper_email" name="exper_email" class="form-control" value= "{{$ss->exper_email}}">
						                                </div>
						                                <div class="col-lg-3 form-group">
						                                    <label for="exper_fax" class="col-form-label">Contact fax</label>
						                                    <input type="text" id="exper_fax" name="exper_fax" class="form-control" value= "{{$ss->exper_fax}}">
						                                </div>
														<div class="col-lg-3 form-group">
															<label for="fileToUpload" class="col-form-label">Upload a Expering certificate</label>
															<div class="input-group file-caption-main">
																<div class="file-caption form-control kv-fileinput-caption">
						  											<span class="file-caption-icon"></span>
															     	<input class="file-caption-name" placeholder="Select files...">
																</div>
																<div class="btn btn-mint btn-file">
																	<i class="fa fa-folder-open"></i>  <span class="hidden-xs">Browse …</span>
																	<input id="fileToUpload" name="fileToUpload" type="file">
																</div>
															</div>
										    			</div>

														<div class="col-lg-9 form-group">
						                                    <label for="exper_notes" class="col-form-label">Additional notes</label>
															<input name="exper_notes" class="form-control" type="text" value= 	"{{ $ss->exper_notes}}">
														</div>
														<div class="col-lg-1 form-group">
															<button type="submit" class="btn btn-labeled btn-warning " >
									                            <span class="btn-label">
									                                <i class="fa fa-edit"></i>
									                            </span>update
							                                </button>
														</div>
													</div><!-- Form row -->	
												</form>
												<form action="{{route('delExper',$ss->id)}}" method="POST">
											            {{ csrf_field() }}
											            {{ method_field('DELETE') }}
														<button class="btn btn-labeled btn-danger form_inline_inputs_bot"><span class="btn-label">
									                                <i class="fa fa-remove"></i>
									                            </span></span>Delete</button>
						        				</form>	
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>
            </div>
        </div>
	</div>
</div>
        
    <!-- /.outer -->
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <!-- Plugin scripts -->
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/twitter-bootstrap-wizard/js/jquery.bootstrap.wizard.min.js')}}"></script>
    <!--End of plugin scripts-->
 	<script type="text/javascript" src="{{asset('assets/vendors/jquery-validation-engine/js/jquery.validationEngine.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery-validation-engine/js/jquery.validationEngine-en.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery-validation/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datetimepicker/js/DateTimePicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/form.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/file_upload_whipping.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/pages/medicalStaff_form_validation.js')}}"></script>

@stop

