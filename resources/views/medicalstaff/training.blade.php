@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Training form
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
                    Training profile
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
                    <li class="breadcrumb-item active">Training</li>
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
                        Add a training
                    </div>

                    <div class="card-body ">
                        <form action="{{route('saveTrain')}}" method="post" class="login_validator" id="form_block_validator" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                            <div class="form-group row">

                                	<input name="user_id" class="col-md-12" type="hidden" value="{{ $MedS->id }}">
                                	
	                                <div class="col-lg-3 form-group">
	                                    <label for="train_desc" class="col-form-label">Training description*</label>
	                                    <input type="text" id="train_desc" name="train_desc" class="form-control" value= "{{old('train_desc')}}" required>
	                                </div>
	                               
									<div class="col-lg-3 form-group">
                                        <label for="train_startdt"  >Start date</label>
                                        <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
                                            <div class="input-group input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                                            
                                            <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="train_startdt" value="{{old('train_startdt')?old('train_startdt'):''}}">
                                                <span class="input-group-addon add-on">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

									<div class="col-lg-3 form-group">
                                        <label for="train_enddt"  >End date</label>
                                        <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
                                            <div class="input-group input-append date" id="dp4" data-date-format="dd-mm-yyyy">
                                            
                                            <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="train_enddt" value="{{old('train_enddt')?old('train_enddt'):''}}">
                                                <span class="input-group-addon add-on">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-lg-3 form-group">
	                                    <label for="train_country" class="col-form-label">Country*</label>
	                                    <input type="text" id="train_country" name="train_country" class="form-control" value= "{{old('train_country')}}" required>
	                                </div>
									<div class="col-lg-3 form-group">
	                                    <label for="train_workplace" class="col-form-label">Workplace*</label>
	                                    <input type="text" id="train_workplace" name="train_workplace" class="form-control" value= "{{old('train_workplace')}}" required>
	                                </div>
									
	                                <div class="col-lg-3 form-group">
	                                    <label for="train_phone" class="col-form-label">Contact telephone</label>
	                                    <input type="text" id="train_phone" name="train_phone" class="form-control" value= "{{old('train_phone')}}">
	                                </div>
	                                <div class="col-lg-3 form-group">
	                                    <label for="train_email" class="col-form-label">Contact email</label>
	                                    <input type="email" id="train_email" name="train_email" class="form-control" value= "{{old('train_email')}}">
	                                </div>
	                                <div class="col-lg-3 form-group">
	                                    <label for="train_fax" class="col-form-label">Contact fax</label>
	                                    <input type="text" id="train_fax" name="train_fax" class="form-control" value= "{{old('train_fax')}}">
	                                </div>
				    				<div class="col-lg-3 form-group">
										<label for="fileToUpload" class="col-form-label">Upload a training certificate</label>
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
	                                    <label for="train_notes" class="col-form-label">Additional notes</label>
										<input name="train_notes" class="form-control" type="text" value= 	"{{ old('train_notes') }}">
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
                        List of trainings
                    </div>
                    <div class="card-body ">
                        <div class="card-body">
                            <div class="m-t-10 accordian_alignment">
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach ($TraCour as $key=>$ss)
                                    <div class="card m-t-20">
                                        <div class="card-header bg-white" role="tab" id="title-{{$key}}">
                                            <a class="collapsed accordion-section-title" data-toggle="collapse" data-parent="#accordion" href="#card-data-{{$key}}" aria-expanded="false">
                                               {{ $ss->train_desc.' from '.$ss->train_startdt .' to '. $ss->train_enddt 
                                               .' in '.$ss->train_workplace }}
                                               
                                              <i class="fa fa-plus float-right m-t-5"></i>
                                            </a>
                                        </div>
                                        <div id="card-data-{{$key}}" class="card-collapse collapse">
                                            <div class="card-body m-t-20">
                                            	<form action="{{route('editTrain',$ss->id)}}" method="post" class="login_validator" id="form_block_validator" enctype="multipart/form-data">
						                        	{{ csrf_field() }}
						                            <div class="form-group row">
						                                	<input name="user_id" class="col-md-12" type="hidden" value="{{ $MedS->id }}">
															<div class="col-lg-3 form-group">
						                                    <label for="train_desc" class="col-form-label">Training description*</label>
						                                    <input type="text" id="train_desc" name="train_desc" class="form-control" value= "{{$ss->train_desc}}" required>
						                                </div>

														<div class="col-lg-3 form-group">
					                                        <label for="train_startdt"  >Start date</label>
					                                        <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
					                                            <div class="input-group input-append date" id="dp2" data-date-format="dd-mm-yyyy">
					                                            
					                                            <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="train_startdt" value="{{old('train_startdt')?old('train_startdt'): $ss->train_startdt}}">
					                                                <span class="input-group-addon add-on">
					                                                    <i class="fa fa-calendar"></i>
					                                                </span>
					                                            </div>
					                                        </div>
					                                    </div>

														<div class="col-lg-3 form-group">
					                                        <label for="train_enddt"  >End date</label>
					                                        <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
					                                            <div class="input-group input-append date" id="dp4" data-date-format="dd-mm-yyyy">
					                                            
					                                            <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="train_enddt" value="{{old('train_enddt')?old('train_enddt'):$ss->train_enddt}}">
					                                                <span class="input-group-addon add-on">
					                                                    <i class="fa fa-calendar"></i>
					                                                </span>
					                                            </div>
					                                        </div>
					                                    </div>



														<div class="col-lg-3 form-group">
						                                    <label for="train_country" class="col-form-label">Country*</label>
						                                    <input type="text" id="train_country" name="train_country" class="form-control" value= "{{$ss->train_country}}" required>
						                                </div>
														<div class="col-lg-3 form-group">
						                                    <label for="train_workplace" class="col-form-label">Workplace*</label>
						                                    <input type="text" id="train_workplace" name="train_workplace" class="form-control" value= "{{$ss->train_workplace}}" required>
						                                </div>
														
						                                <div class="col-lg-3 form-group">
						                                    <label for="train_phone" class="col-form-label">Contact telephone</label>
						                                    <input type="text" id="train_phone" name="train_phone" class="form-control" value= "{{$ss->train_phone}}">
						                                </div>
						                                <div class="col-lg-3 form-group">
						                                    <label for="train_email" class="col-form-label">Contact email</label>
						                                    <input type="email" id="train_email" name="train_email" class="form-control" value= "{{$ss->train_email}}">
						                                </div>
						                                <div class="col-lg-3 form-group">
						                                    <label for="train_fax" class="col-form-label">Contact fax</label>
						                                    <input type="text" id="train_fax" name="train_fax" class="form-control" value= "{{$ss->train_fax}}">
						                                </div>
														<div class="col-lg-3 form-group">
															<label for="fileToUpload" class="col-form-label">Upload a training certificate</label>
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
						                                    <label for="train_notes" class="col-form-label">Additional notes</label>
															<input name="train_notes" class="form-control" type="text" value= 	"{{ $ss->train_notes}}">
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
												<form action="{{route('delTrain',$ss->id)}}" method="POST">
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

