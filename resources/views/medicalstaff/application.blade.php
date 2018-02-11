@extends ('layouts/fixed_menu')

@section('content')

<!--  @if ($errors->any())
	 <div class="container">
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	    </div>
	@endif -->
 
<form action="{{route('saveMS')}}" method="post"    enctype="multipart/form-data">
	{{ csrf_field() }}
	<h1>Apply as a medical staff</h1>
	<div class="col-lg-12">
	<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Personal information</h2></div>

            <div class="panel-body">
					<input name="user_id" class="col-md-12" type="hidden" value= {{ $MedS->user_id }} >
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
						     <label for="first_name"  >First Name</label>
							<input type="text" class="form-control" name="first_name" 
								value= 	"{{old('first_name')?old('first_name'):$MedS->first_name}}" required autofocus>
						 </div>
					</div>
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('second_name') ? ' has-error' : '' }}">
						     <label for="second_name"  >Second Name</label>
							<input type="text" class="form-control" name="second_name" 
							    value= 	@if( $MedS->second_name )
							     			"{{$MedS->second_name}}"
							     		@else	
							     			"{{ old('second_name') }}" 
							     		@endif 
							    placeholder=""    >
						 </div>
					</div>
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('third_name') ? ' has-error' : '' }}">
						     <label for="third_name"  >Third Name</label>
							<input type="text" class="form-control" name="third_name" 
							    value=	@if( $MedS->third_name )
							     			"{{$MedS->third_name}}"
							     		@else	
							     			"{{ old('third_name') }}" 
							     		@endif 
							    placeholder=""    >
						</div>
					</div>
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('family_name') ? ' has-error' : '' }}">
						     <label for="family_name"  >Family Name</label>
							<input type="text" class="form-control" name="family_name" 
							    value=	@if( $MedS->family_name )
							     			"{{$MedS->family_name}}"
							     		@else	
							     			"{{ old('family_name') }}" 
							     		@endif 
							    placeholder=""    >
						 </div>
					</div><!-- Name English -->
					<div class="col-md-12" >
						@if ($errors->has('first_name'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('first_name') }}</strong>
		                        </span> 
	                    @endif
						@if ($errors->has('second_name'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('second_name') }}</strong>
		                        </span> 
	                    @endif
						@if ($errors->has('third_name'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('third_name') }}</strong>
		                        </span> 
	                    @endif
						@if ($errors->has('family_name'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('family_name') }}</strong>
		                        </span> 
	                    @endif
					</div> <!-- Errors for English name -->
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('first_name_ar') ? ' has-error' : '' }}">
						     <label for="first_name_ar"  >الاسم الأول</label>
							<input type="text" class="form-control" name="first_name_ar" 
							    value=	@if( $MedS->first_name_ar )
							     			"{{$MedS->first_name_ar}}"
							     		@else	
							     			"{{ old('first_name_ar') }}" 
							     		@endif 
							    placeholder=""    >
						 </div>
					</div>
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('second_name_ar') ? ' has-error' : '' }}">
						     <label for="second_name_ar"  >الاسم الثاني</label>
							<input type="text" class="form-control" name="second_name_ar" 
						     	value=	@if( $MedS->second_name_ar )
						     				"{{$MedS->second_name_ar}}"
							     		@else	
							     			"{{ old('second_name_ar') }}" 
							     		@endif 
							    placeholder=""    >
						 </div>
					</div>
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('third_name_ar') ? ' has-error' : '' }}">
						     <label for="third_name_ar"  >الاسم الثالث</label>
							<input type="text" class="form-control" name="third_name_ar" 
							    value= 	@if( $MedS->third_name_ar )
								     			"{{$MedS->third_name_ar}}"
								     		@else	
								     			"{{ old('third_name_ar') }}" 
								     		@endif 
							    placeholder=""    >
						 </div>
					</div>
					<div class="col-md-3" > 
						<div class="form-group {{ $errors->has('family_name_ar') ? ' has-error' : '' }}">
						     <label for="family_name_ar"  >اسم العائلة</label>
							<input type="text" class="form-control" name="family_name_ar" 
						     	value=  @if( $MedS->family_name_ar )
							     			"{{$MedS->family_name_ar}}"
							     		@else	
							     			"{{ old('family_name_ar') }}" 
							     		@endif
					     		placeholder=""    >
						 </div>
					</div><!-- End of Arabic name -->
					<div class="col-md-12" >
						@if ($errors->has('first_name_ar'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('first_name') }}</strong>
		                        </span> 
	                    @endif 
						@if ($errors->has('second_name_ar'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('second_name') }}</strong>
		                        </span> 
	                    @endif
						@if ($errors->has('third_name_ar'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('third_name') }}</strong>
		                        </span> 
	                    @endif
						@if ($errors->has('family_name_ar'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('family_name') }}</strong>
		                        </span> 
	                    @endif
					</div> <!-- Errors for Arabic name -->
					<!-- End of name fields -->
				<row>
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('natno') ? ' has-error' : '' }}">
						    <label for="natno"  >Nationality</label>
							<select class="form-control" id="natno" name="natno">
                                <option disabled selected value> -- select a nationality -- </option>
                                @foreach($nat as $n)
                                    <option {{old('natno',$MedS->natno)==$n->natno? 'selected':''}}  value={{ $n->natno}} > {{$n->nat_desc}}</option>
                                @endforeach
                            </select>
						 </div>
					</div><!-- Nationality -->
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
						     <label for="dob"  >Date of birth</label>
							<!-- <input type="text" class="form-control" name="dob" 
											     value="{{ old('dob') }}" 
											    placeholder=""    > -->
						    <div class="input-group date">
    							<input type="date" class="form-control" name="dob" 
    							value = 
    							 @if( $MedS->dob )
									     			"{{$MedS->dob}}"
									     		@else	
									     			"{{ old('dob') }}" 
									     		@endif >
    							<div class="input-group-addon">
    							<span class="glyphicon glyphicon-th"></span>
    							</div>
							</div>
						 </div>
					</div>
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
						     <label for="gender"  >Gender</label>
							<select class="form-control" id="gender" name="gender" >
                                <option disabled selected value> -- select the gender -- </option>
                                <option {{old('gender',$MedS->gender)=="M"? 'selected':''}}  value="M">Male</option>
							    <option {{old('gender',$MedS->gender)=="F"? 'selected':''}} value="F">Female</option>
							</select>
						 </div>
					</div>
				</row>
				<row>
					<div class="col-md-4" >
						@if ($errors->has('natno'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('natno') }}</strong>
		                        </span> 
	                     @endif
					</div>
					<div class="col-md-4" >
						@if ($errors->has('dob'))
		                       	<span class="help-block">
		                            <strong>{{ $errors->first('dob') }}</strong>
		                        </span> 
	                    @endif
					</div>
					<div class="col-md-4" >
						@if ($errors->has('gender'))
		                       	<span class="help-block">
		                            <strong>{{ $errors->first('gender') }}</strong>
		                        </span> 
	                    @endif
					</div>
				</row>
				<row>
					<div class="col-md-2" ></div>
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
						     <label for="phone"  >Telephone</label>
							<input type="text" class="form-control" name="phone" 
							    value=	@if( $MedS->phone )
							     			"{{$MedS->phone}}"
							     		@else	
							     			"{{ old('phone') }}" 
							     		@endif 
							    placeholder="">
						    @if ($errors->has('phone'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('phone') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
						     <label for="mobile"  >Mobile</label>
							<input type="text" class="form-control" name="mobile" 
								value=	@if( $MedS->mobile )
							     			"{{$MedS->mobile}}"
							     		@else	
							     			"{{ old('mobile') }}" 
							     		@endif 
							    placeholder="966 000 000000">

						    @if ($errors->has('mobile'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('mobile') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div><!-- DOB -->	
					</row> <!-- Mobile information -->
					<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
		                            <label for="address" class="col-md-12 control-label">Address</label>

		                            <div class="col-md-12">
		                                <input id="address" type="text" class="form-control input-lg" name="address" placeholder="Country - city - district" 
		                                value=	@if( $MedS->address )
							     					"{{$MedS->address}}"
							     				@else	
							     					"{{ old('address') }}" 
							     				@endif 
							   			placeholder="">
		                                @if ($errors->has('address'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('address') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		        	</div>
		        	
		        			
		        					
        	</div> <!-- Panel Body -->
        	<div class="panel-heading"><h2>Adminstrative information</h2></div>

            <div class="panel-body">
            		<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('catgno') ? ' has-error' : '' }}">
						     <label for="catgno"  >Category</label>
							<select class="form-control" id="catgno" name="catgno" value="{{ old('natno') }}" required autofocus>
                                <option disabled selected value> -- select category -- </option>
	                                @foreach($cat as $ca)
	                                    <option {{old('catgno',$MedS->catgno)==$ca->catgno? 'selected':''}}  value={{ $ca->catgno}} > {{$ca->catg_desc}}</option>
	                                @endforeach
                            </select>
						    @if ($errors->has('catgno'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('catgno') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('depno') ? ' has-error' : '' }}">
						     <label for="depno"  >Department</label>
							<select class="form-control" id="depno" name="depno" value="{{ old('natno') }}" required autofocus>
                                <option disabled selected value> -- select department -- </option>
                                @foreach($dept as $de)
                                	<option {{old('depno',$MedS->depno)==$de->id? 'selected':''}}  value={{ $de->id}} > {{$de->dept_nam}}</option>
                                @endforeach
                            </select>
						    @if ($errors->has('depno'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('depno') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('depno') ? ' has-error' : '' }}">
						     <label for="dispno"  >Discipline</label>
							<select class="form-control" id="dispno" name="dispno" value="{{ old('natno') }}" required autofocus>
                                <option disabled selected value> -- select discipline -- </option>
                                @foreach($disc as $di)
                               		<option {{old('dispno',$MedS->dispno)==$di->dispno? 'selected':''}}  value={{ $di->dispno}} > {{$di->disp_desc}}</option>
                                @endforeach
                            </select>
						    @if ($errors->has('dispno'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('dispno') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('empno') ? ' has-error' : '' }}">
						     <label for="empno"  >Employee number</label>
							<input type="text" class="form-control" name="empno" 
								   value=	@if( $MedS->empno )
				     					"{{$MedS->empno}}"
				     				@else	
				     					"{{ old('empno') }}" 
				     				@endif 
								    placeholder="00000"    >
						    @if ($errors->has('empno'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('empno') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
					<!-- <div class="col-md-2" ></div> -->
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('licence_no') ? ' has-error' : '' }}">
						     <label for="licence_no"  >License number</label>
							<input type="text" class="form-control" name="licence_no" 
							    value=	@if( $MedS->licence_no )
				     						"{{$MedS->licence_no}}"
				     					@else	
				     						"{{ old('licence_no') }}" 
				     					@endif 
								    placeholder=""    >
						    @if ($errors->has('licence_no'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('licence_no') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
					<div class="col-md-4" > 
						<div class="form-group {{ $errors->has('licence_expdate') ? ' has-error' : '' }}">
							<label for="licence_expdate"  >License expiry date</label>
					    	
            					
        					
						    <div class="input-group date">
						    	<input type="date" class="form-control" name="licence_expdate" value=	@if( $MedS->licence_expdate )
				     					"{{$MedS->licence_expdate}}"
				     				@else	
				     					"{{ old('licence_expdate') }}" 
				     				@endif 
								    placeholder=""    >
    							<div class="input-group-addon">
    							<span class="glyphicon glyphicon-th"></span>
    							</div>
							</div>

						    @if ($errors->has('licence_expdate'))
		                       <span class="help-block">
		                            <strong>{{ $errors->first('licence_expdate') }}</strong>
		                        </span> 
		                     @endif
						 </div>
					</div>
        	<row class="col-md-12">
        		<div class="form-group form-inline">
	                <div class="col-md-3 col-md-offset-4">
	                    <button type="submit" class="btn btn-primary">
	                        Apply
	                    </button>
	                </div>
	                <div class="form-group">
	                    <div class="col-md-3">
	                        <button type="cancel" action="{{route('home')}}" class="btn btn-danger">
	                            Cancel
	                        </button>
	                    </div>
	                </div>
	            </div>
	        </row>
        	</div><!-- Panel Body -->
        	
		</div> <!-- container -->
	</div><!-- Row -->

	</div><!-- col-lg-12 -->
			
	</form>

</div>

@endsection
@section('script')
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endsection