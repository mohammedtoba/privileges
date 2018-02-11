@extends('layouts/fixed_menu')
 
{{-- Page title --}}
@section('title')
    Education form
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
     
     <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/swiper/css/swiper.min.css')}}"/>
    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
     <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jquery-validation-engine/css/validationEngine.jquery.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datepicker/css/bootstrap-datepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datetimepicker/css/DateTimePicker.min.css')}}">
    
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
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fileinput/css/fileinput.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/fileUploadWhipping.css')}}"/>
    
@stop


{{-- Page content --}}
@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-lg-6 col-sm-4">
                <h4 class="nav_top_align">
                    <i class="fa fa-stethoscope"></i>
                    Education informations
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
                    <li class="breadcrumb-item active">Education</li>
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
                        Add an education
                    </div>
                    <div class="card-body ">
                        <form action="{{route('saveQual')}}" method="post" class=" form_block_validator" id="form_block_validator" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                            <div class="row">
                                	<input name="user_id" class="col-md-12" type="hidden" value="{{ $MedS->id }}" >
                                <div class="col-lg-3 form-group">
                                    <label for="qualif_desc" class="col-form-label">Specialty*</label>
                                    <input type="text" id="qualif_desc" name="qualif_desc" class="form-control required" required value= "{{old('qualif_desc')}}" >
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label for="qual_typ" class="col-form-label">Education type*</label>
										<select class="form-control required" required id="qual_typ" name="qual_typ" >
					        				<option disabled selected value> -- select Type -- </option>
								        	@foreach($qtyp as $qt)
							       			<option  {{old('qual_typ')==$qt->qual_typ? 'selected':''}} value={{ $qt->qual_typ}} > {{$qt->qual_typ_desc}}</option>
								        	@endforeach
					    				</select>
                                </div>
                                <div class="col-lg-1 form-group">
									<label for="qualif_year" class="control-label">Graduation year*</label>
                                    <input type="text" id="qualif_year" name="qualif_year" class="form-control required" required value= "{{old('qualif_year')}}" >
								</div>
								<div class="col-lg-2 form-group">
                                    <label for="qualif_country" class="col-form-label">Country*</label>
                                    <input type="text" id="qualif_country" name="qualif_country" class="form-control required" required value= "{{old('qualif_country')}}" >
                                </div>
								<div class="col-lg-3 form-group">
                                    <label for="qualif_univ" class="col-form-label">University*</label>
                                    <input type="text" id="qualif_univ" name="qualif_univ" class="form-control required" required value= "{{old('qualif_univ')}}" >
                                </div>
								<div class="col-lg-3 form-group">
                                    <label for="college" class="col-form-label">College*</label>
                                    <input type="text" id="college" name="college" class="form-control" value= "{{old('college')}}" >
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label for="clg_phone" class="col-form-label">College telephone</label>
                                    <input type="text" id="clg_phone" name="clg_phone" class="form-control" value= "{{old('clg_phone')}}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label for="clg_email" class="col-form-label">College email</label>
                                    <input type="email" id="clg_email" name="clg_email" class="form-control" value= "{{old('clg_email')}}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label for="clg_fax" class="col-form-label">College fax</label>
                                    <input type="text" id="clg_fax" name="clg_fax" class="form-control" value= "{{old('clg_fax')}}">
                                </div>
								<div class="col-lg-4 form-group">
																		<!-- <div class="input-group">
						                <label class="input-group-btn">
						                	
						                    <span class="btn btn-mint"><i class="fa fa-folder"></i>
						                        Browse&hellip; <input name="fileToUpload" type="file" style="display: none;" multiple>
						                    </span>
						                </label>
						                <input type="text" class="form-control" readonly>
						            </div> -->
        							<!-- <div class="input-group">
                						<label class="input-group-btn">
                							
                    						<span class="btn btn-labeled col-lg-12 btn-mint">
                    							<span class="btn-label">
			                                	<i class="fa fa-folder"></i>
			                            	</span>
                    						 Browse&hellip; <input type="file" style="display: none;" multiple>
                    						</span>
                						</label>
                						<input type="text" class="form-control" readonly>
            						</div> -->
						            <label for="fileToUpload" class="col-form-label">Upload an education certificate</label>
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
		                                <!-- <label for="fileToUpload" class="col-form-label">Upload a file<span class="fa fa-3x fa-paperclip"></span></label>
										<input type="file" name="fileToUpload" id="fileToUpload" > -->
									
				    			</div>
								<div class="col-lg-8 form-group">
                                    <label for="qualif_notes" class="col-form-label">Additional notes</label>
									<input name="qualif_notes" class="form-control" type="text" value= 	"{{ old('qualif_notes') }}">
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
                        List of educations
                    </div>
                    <div class="card-body ">
                        <div class="card-body">
                            <div class="m-t-10 accordian_alignment">
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach ($qual as $key=>$ss)
                                    <div class="card m-t-20">
                                        <div class="card-header bg-white " role="tab" id="title-{{$key}}">
                                            <a class="collapsed accordion-section-title" data-toggle="collapse" data-parent="#accordion" href="#card-data-{{$key}}" aria-expanded="false">
                                               {{$ss->qual_typ_desc.' in '.$ss->qualif_desc.' on '.$ss->qualif_year}}
                                               
                                              <i class="fa fa-plus float-right m-t-5"></i>
                                            </a>
                                        </div>
                                        <div id="card-data-{{$key}}" class="card-collapse collapse">
                                            <div class="card-body m-t-20">
                                            	<form action="{{route('editQual',$ss->id)}}" method="post" class="login_validator form_block_validator"  enctype="multipart/form-data">
						                        	{{ csrf_field() }}
						                            <div class="row">
						                                	<input name="user_id" class="col-md-12" type="hidden" value="{{ $MedS->id }}">
						                                <div class="col-lg-3 form-group">
						                                    <label for="qualif_desc" class="col-form-label">Specialty*</label>
						                                    <input type="text" id="qualif_desc" name="qualif_desc" class="form-control" value= "{{$ss->qualif_desc}}" >
						                                </div>
						                                <div class="col-lg-3 form-group">
						                                    <label for="qual_typ" class="col-form-label">Education type*</label>
																<select class="form-control" id="qual_typ" name="qual_typ" >
											        				<option disabled selected value> -- select Type -- </option>
														        	@foreach($qtyp as $qt)
													       			<option  {{($ss->qual_typ)==$qt->qual_typ? 'selected':''}} value={{ $qt->qual_typ}} > {{$qt->qual_typ_desc}}</option>
														        	@endforeach
											    				</select>
						                                </div>
						                                <div class="col-lg-1 form-group">
															<label for="qualif_year" class="col-form-label">Year*</label>
						                                    <input type="text" id="qualif_year" name="qualif_year" class="form-control" value= "{{$ss->qualif_year}}" >
														</div>
														<div class="col-lg-2 form-group">
						                                    <label for="qualif_country" class="col-form-label">Country*</label>
						                                    <input type="text" id="qualif_country" name="qualif_country" class="form-control" value= "{{$ss->qualif_country}}" >
						                                </div>
														<div class="col-lg-3 form-group">
						                                    <label for="qualif_univ" class="col-form-label">University*</label>
						                                    <input type="text" id="qualif_univ" name="qualif_univ" class="form-control" value= "{{$ss->qualif_univ}}" >
						                                </div>
														<div class="col-lg-3 form-group">
						                                    <label for="college" class="col-form-label">College*</label>
						                                    <input type="text" id="college" name="college" class="form-control" value= "{{$ss->college}}" >
						                                </div>
						                                <div class="col-lg-3 form-group">
						                                    <label for="clg_phone" class="col-form-label">College telephone</label>
						                                    <input type="text" id="clg_phone" name="clg_phone" class="form-control" value= "{{$ss->clg_phone}}">
						                                </div>
						                                <div class="col-lg-3 form-group">
						                                    <label for="clg_email" class="col-form-label">College email</label>
						                                    <input type="email" id="clg_email" name="clg_email" class="form-control" value= "{{$ss->clg_email}}">
						                                </div>
						                                <div class="col-lg-3 form-group">
						                                    <label for="clg_fax" class="col-form-label">College fax</label>
						                                    <input type="text" id="clg_fax" name="clg_fax" class="form-control" value= "{{$ss->clg_fax}}">
						                                </div>
														<div class="col-lg-4 form-group">
															<label for="fileToUpload" class="col-form-label">Upload an education certificate</label>
															<div class="input-group file-caption-main">
																<div class="file-caption form-control kv-fileinput-caption">
						  											<span class="file-caption-icon"></span>
															     	<input class="file-caption-name" placeholder="Select files...">
																</div>
																<div class="btn btn-mint btn-file">
																	<i class="fa fa-folder-open"></i>  <span class="hidden-xs">Browse …</span>
																	<input id="fileToUpload" name="fileToUpload" type="file">
																</div>
								                                <!-- <label for="fileToUpload" class="col-form-label">Upload a file<span class="fa fa-3x fa-paperclip"></span></label>
																<input type="file" name="fileToUpload" id="fileToUpload" > -->
															</div>
										    			</div>

														<div class="col-lg-8 form-group">
						                                    <label for="qualif_notes" class="col-form-label">Additional notes</label>
															<input name="qualif_notes" class="form-control" type="text" value= 	"{{ $ss->qualif_notes}}">
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
												<form action="{{route('delQual',$ss->id)}}" method="POST">
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
                
                            <!-- <div class="row">
                                <div class="col">

								<table class="table table-hover">
									<thead>
									     	<tr class="text-center"> 
										     	<th style="width: 20%">Specialty</th> 
										     	<th style="width: 15%">Type</th>
										     	<th style="width: 5%">Year</th>
										     	<th style="width: 10%">Country</th>
										     	<th style="width: 10%">University</th>
										     	<th style="width: 10%">College</th>
										     	<th style="width: 5%">Upload</th>
										     	<th style="width: 10%">Comments</th>
										     	<th style="width: 5%">Update</th>
										     	<th style="width: 5%">Delete</th>
										     </tr> 
								    </thead>
								    <tbody>
								 		@foreach ($qual as $ss) 
									    	<tr> 
								    		<form action="{{route('editQual',$ss->id)}}" method="POST">
											            {{ csrf_field() }}
									    		<td>
									    			<input name="user_id" class="col-md-12" type="hidden" value= {{ $MedS->id }} >
									    			<input type="text" class="form-control" id="qualif_desc" name="qualif_desc"
													value= 	"{{$ss->qualif_desc}}">
												</td>
												<td>
													<select class="form-control" id="qual_typ" name="qual_typ">
								        				<option disabled selected value> -- select Type -- </option>
											        	@foreach($qtyp as $qt)
												       		<option  @if($ss->qual_typ==$qt->qual_typ)selected @endif
												       		value={{ $qt->qual_typ}} > {{$qt->qual_typ_desc}}</option>
											        	@endforeach
							    					</select>
													
												</td>
												<td>
													<input name="qualif_year" class="form-control" type="text"
								    				value= "{{$ss->qualif_year}}">
												</td>
												<td>
													<input name="qualif_country" class="form-control" type="text"
								    				value= 	"{{$ss->qualif_country}}">
												</td>
												<td>
													<input name="qualif_univ" class="form-control" type="text"
								    				value= 	"{{$ss->qualif_univ}}">
								    			</td>
												<td>
													<input name="college" class="form-control" type="text"
								    				value= 	"{{$ss->college}}">
												</td>

												<td style="text-align: center;">
													@if($ss->qualif_file_upload)
													<a class="btn btn-success" 
													href="storage/app/{{$ss->qualif_file_upload}}"
													><span class="fa fa-paperclip" style="font-size: 1.5em; text-align: center;"></span></a>
													@else
													<label class="btn btn-default btn-file">
									    			<span class="fa fa-paperclip" style="font-size: 1.5em; text-align: center;"></span>
									    			<input type="file" name="fileToUpload" id="fileToUpload" style="display: none;" >
								    				</label>
													@endif
													</td>
												<td>
													<input name="qualif_notes" class="form-control" type="text"
								    				value= 	"{{$ss->qualif_notes}}"
												</td>
									    		<td style="text-align: center;">
									    			<button class="btn btn-mint"><span class="fa fa-edit" aria-hidden="true"></span></button>
							        				
									    		</td>
								    		</form>
									    		<td style="text-align: center;">
									    			<form action="{{route('delQual',$ss->id)}}" method="POST">
											            {{ csrf_field() }}
											            {{ method_field('DELETE') }}
														<button class="btn btn-danger"><span class="fa fa-remove" aria-hidden="true"></span></button>
							        				</form>
								    			</td>
									    	</tr> 
									    @endforeach
								    </tbody>
			    				</table>
		    				</div>
                        </div> -->
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
