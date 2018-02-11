@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Application form
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/wizards.css')}}"/>
    <!-- end of page level styles -->
    <!-- Date Picker -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/inputlimiter/css/jquery.inputlimiter.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jquery-tagsinput/css/jquery.tagsinput.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/daterangepicker/css/daterangepicker.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datepicker/css/bootstrap-datepicker.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datetimepicker/css/DateTimePicker.min.css')}}" />
@stop


{{-- Page content --}}
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-6 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-stethoscope"></i>
                        Apply as a medical staff
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
                        <li class="breadcrumb-item active">Apply</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer form_wizzards">
        <div class="inner bg-container">


            <div class="row">
                <div class="col">
                    <div class="card ">
                        <div class="card-header bg-mint">
                            <i class="fa fa-file-text-o"></i>
                            Application form
                        </div>
                        <div class="card-body ">
                            <!--main content-->
                            <div class="row">
                                <div class="col">
                                    <!-- BEGIN FORM WIZARD WITH VALIDATION action="form_wizards" -->
                                    <form  action="{{route('saveMS')}}" method="post"    enctype="multipart/form-data"  class="validate">
                                        {{ csrf_field() }}
                                        <div id="rootwizard">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item m-t-15">
                                                    <a class="nav-link" href="#tab1" data-toggle="tab">
                                                        <span class="userprofile_tab1">1</span>Personal information</a>
                                                </li>
                                                <li class="nav-item m-t-15">
                                                    <a class="nav-link" href="#tab2" data-toggle="tab">
                                                        <span class="userprofile_tab2">2</span>Adminstrative information</a>
                                                </li>
                                                <li class="nav-item m-t-15">
                                                    <a class="nav-link" href="#tab3"
                                                       data-toggle="tab"><span>3</span>Experience and training</a>
                                                </li>
                                                <li class="nav-item m-t-15">
                                                    <a class="nav-link" href="#tab4"
                                                       data-toggle="tab"><span>3</span>Licensure</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content m-t-20">
                                                <div class="tab-pane" id="tab1">
                                                    <div class="row form-horizontal">
                                                        <div class="form-group col-lg-3">
                                                            <label for="first_name" class="control-label">First name*</label>
                                                                <input id="first_name" name="first_name" type="text" class="form-control required" value=   "{{old('first_name')?old('first_name'):$MedS->first_name}}" required autofocus>
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="second_name" class="control-label">Second name*</label>
                                                                <input id="second_name" name="second_name" type="text" class="form-control required" value=   "{{old('second_name')?old('second_name'):$MedS->second_name}}">
                                                        </div>

                                                        <div class="form-group col-lg-3">
                                                            <label for="first_name" class="control-label">Third Name*</label>
                                                                <input id="third_name" name="third_name" type="text" class="form-control required" value=   "{{old('third_name')?old('third_name'):$MedS->third_name}}">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="first_name" class="control-label">Family name*</label>
                                                                <input id="family_name" name="family_name" type="text" class="form-control required" value=   "{{old('family_name')?old('family_name'):$MedS->family_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="row form-horizontal">
                                                        <div class="form-group col-lg-3">
                                                            <label for="first_name_ar" class="control-label">الاسم الأول</label>
                                                                <input id="first_name_ar" name="first_name_ar" type="text" class="form-control required" value=   "{{old('first_name_ar')?old('first_name_ar'):$MedS->first_name_ar}}">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="second_name_ar" class="control-label">الاسم الثاني</label>
                                                                <input id="second_name_ar" name="second_name_ar" type="text" class="form-control required" value="{{old('second_name_ar')?old('second_name_ar'):$MedS->second_name_ar}}">
                                                        </div>

                                                        <div class="form-group col-lg-3">
                                                            <label for="third_name_ar" class="control-label">الاسم الثالث</label>
                                                                <input id="third_name_ar" name="third_name_ar" type="text" class="form-control required" value="{{old('third_name_ar')?old('third_name_ar'):$MedS->third_name_ar}}">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="first_name_ar" class="control-label">اسم العائلة*</label>
                                                                <input id="family_name_ar" name="family_name_ar" type="text" class="form-control required" value="{{old('family_name_ar')?old('family_name_ar'):$MedS->family_name_ar}}">
                                                        </div>
                                                    </div>
                                                    <div class="row form-horizontal">
                                                        <div class="col-lg-4 form-group">
                                                            <label for="dob"  >Date of birth</label>
                                                            <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
                                                                <div class="input-group input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                                                                
                                                                <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="dob" value="{{old('dob')?old('dob'):$MedS->dob}}">
                                                                    <span class="input-group-addon add-on">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="gender"  >Gender</label>
                                                            <select class="form-control" id="gender" name="gender" >
                                                                <option disabled selected value> -- select the gender -- </option>
                                                                <option {{old('gender',$MedS->gender)=="M"? 'selected':''}}  value="M">Male</option>
                                                                <option {{old('gender',$MedS->gender)=="F"? 'selected':''}} value="F">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="natno"  >Nationality</label>
                                                            <select class="form-control required" id="natno" name="natno">
                                                                <option disabled selected value> -- select a nationality -- </option>
                                                                @foreach($nat as $n)
                                                                    <option {{old('natno',$MedS->natno)==$n->natno? 'selected':''}}  value={{ $n->natno}} > {{$n->nat_desc}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div><!-- row form horizontal -->
                                                    <div class="row form-horizontal">    
                                                        <div class="form-group col-lg-2"></div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Home number *</label>
                                                            <input type="text" class="form-control" id="phone"
                                                                   name="phone"
                                                                   placeholder="(999)999-9999" value="{{old('phone')?old('phone'):$MedS->phone}}">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label>Mobile number *</label>
                                                            <input type="text" class="form-control" id="mobile"
                                                                   name="mobile"
                                                                   placeholder="(999)999-9999" value="{{old('mobile')?old('mobile'):$MedS->mobile}}">
                                                        </div>
                                                    </div> <!-- row form horizontal -->
                                                    <hr>
                                                    <div class="row form-horizontal">
                                                        <div class="form-group col-lg-4">
                                                            <label for="catgno"  >Category</label>
                                                            <select class="form-control" id="catgno" name="catgno" value="{{ old('catgno') }}" required autofocus>
                                                                <option disabled selected value> -- select category -- </option>
                                                            @foreach($cat as $ca)
                                                                <option {{old('catgno',$MedS->catgno)==$ca->catgno? 'selected':''}}  value={{ $ca->catgno}} > {{$ca->catg_desc}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="specno"  >Speciality</label>
                                                            <select class="form-control" id="specno" name="specno" value="{{ old('specno') }}" required autofocus>
                                                                <option disabled selected value> -- select speciality -- </option>
                                                            @foreach($spec as $descrip)
                                                                <option {{old('specno',$MedS->specno)==$descrip->specno? 'selected':''}}  value={{ $descrip->specno}} > {{$descrip->spec_desc}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="depno"  >Department</label>
                                                            <select class="form-control" id="depno" name="depno" value="{{ old('depno') }}" required autofocus>
                                                                <option disabled selected value> -- select department -- </option>
                                                                @foreach($dept as $de)
                                                                    <option {{old('depno',$MedS->depno)==$de->id? 'selected':''}}  value={{ $de->id}} > {{$de->dept_nam}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div><!-- form horizontal row -->
                                                    <div class="row form-horizontal">
                                                        <div class="form-group col-lg-4">
                                                           <label for="dispno"  >Discipline</label>
                                                            <select class="form-control" id="dispno" name="dispno" value="{{ old('dispno') }}" required autofocus>
                                                                <option disabled selected value> -- select discipline -- </option>
                                                                @foreach($disc as $di)
                                                                    <option {{old('dispno',$MedS->dispno)==$di->dispno? 'selected':''}}  value={{ $di->dispno}} > {{$di->disp_desc}}</option>
                                                                @endforeach
                                                            </select> 
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="empno"  >Employee number</label>
                                                            <input type="text" class="form-control" name="empno" value="{{old('empno')?old('empno'):$MedS->empno}}">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="join_date"  >Joining date</label>
                                                            <div wtx-context="0DF48A1B-7A2F-45AD-8D45-7C0154E8618B">
                                                                <div class="input-group input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                                                                
                                                                <input class="form-control" type="text" placeholder="dd-mm-yyyy" wtx-context="01AB525D-5B95-4AD7-9455-C9E885F83A8D" name="join_date" value="{{old('join_date')?old('join_date'):$MedS->join_date}}">
                                                                    <span class="input-group-addon add-on">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- form horizontal row -->  
                                                    <ul class="pager wizard pager_a_cursor_pointer">
                                                        <li class="previous">
                                                            <a><i class="fa fa-long-arrow-left"></i>
                                                                Previous</a>
                                                        </li>
                                                        <li class="btn-primary">
                                                            <button action="submit">Next <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next">
                                                            <a onclick="form.submit();">Next <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next finish" style="display:none;">
                                                            <a>Finish</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                    </form>
                                                <div class="tab-pane" id="tab2">
                                                    <div class="form-group">
                                                        <label for="name1" class="control-label">First name
                                                            *</label>
                                                        <input id="name1" name="val_first_name"
                                                               placeholder="Enter your First name"
                                                               type="text"
                                                               class="form-control required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="surname1" class="control-label">Last
                                                            name *</label>
                                                        <input id="surname1" name="lname" type="text"
                                                               placeholder=" Enter your Last name"
                                                               class="form-control required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Gender</label>
                                                        <select class="custom-select form-control"
                                                                id="gender"
                                                                title="Select an account type...">
                                                            <option>Select</option>
                                                            <option>MALE</option>
                                                            <option>FEMALE</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address *</label>
                                                        <input id="address" name="val_address" type="text"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="age" class="control-label">Age *</label>
                                                        <input id="age" name="val_age" type="text"
                                                               maxlength="3"
                                                               class="form-control required number">
                                                    </div>
                                                    <ul class="pager wizard pager_a_cursor_pointer">
                                                        <li class="previous">
                                                            <a><i class="fa fa-long-arrow-left"></i>
                                                                Previous</a>
                                                        </li>
                                                        <li class="next">
                                                            <a>Next <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next finish" style="display:none;">
                                                            <a>Finish</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="tab-pane" id="tab3">
                                                    <div class="form-group">
                                                        <label for="name1" class="control-label">First name
                                                            *</label>
                                                        <input id="name1" name="val_first_name"
                                                               placeholder="Enter your First name"
                                                               type="text"
                                                               class="form-control required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="surname1" class="control-label">Last
                                                            name *</label>
                                                        <input id="surname1" name="lname" type="text"
                                                               placeholder=" Enter your Last name"
                                                               class="form-control required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Gender</label>
                                                        <select class="custom-select form-control"
                                                                id="gender"
                                                                title="Select an account type...">
                                                            <option>Select</option>
                                                            <option>MALE</option>
                                                            <option>FEMALE</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address *</label>
                                                        <input id="address" name="val_address" type="text"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="age" class="control-label">Age *</label>
                                                        <input id="age" name="val_age" type="text"
                                                               maxlength="3"
                                                               class="form-control required number">
                                                    </div>
                                                    <ul class="pager wizard pager_a_cursor_pointer">
                                                        <li class="previous">
                                                            <a><i class="fa fa-long-arrow-left"></i>
                                                                Previous</a>
                                                        </li>
                                                        <li class="next">
                                                            <a>Next <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next finish" style="display:none;">
                                                            <a>Finish</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="tab4">
                                                    <div class="form-group">
                                                        <label>Home number *</label>
                                                        <input type="text" class="form-control" id="phone1"
                                                               name="phone1"
                                                               placeholder="(999)999-9999">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Personal number *</label>
                                                        <input type="text" class="form-control" id="phone2"
                                                               name="phone2"
                                                               placeholder="(999)999-9999">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alternate number *</label>
                                                        <input type="text" class="form-control" id="phone3"
                                                               name="phone3"
                                                               placeholder="(999)999-9999">
                                                    </div>
                                                    <div class="form-group">
                                                        <span>Terms and Conditions *</span>
                                                        <br>
                                                        <label class="custom-control custom-checkbox wizard_label_block">
                                                            <input type="checkbox" id="acceptTerms"
                                                                   name="acceptTerms"
                                                                   class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description custom_control_description_color">I agree with the Terms and Conditions.</span>
                                                        </label>

                                                    </div>
                                                    <ul class="pager wizard pager_a_cursor_pointer">
                                                        <li class="previous">
                                                            <a><i class="fa fa-long-arrow-left"></i>
                                                                Previous</a>
                                                        </li>
                                                        <li class="next">
                                                            <a>Next <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next finish" style="display:none;">
                                                            <a>Finish</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h4 class="modal-title">Wizard</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>You Submitted Successfully.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                            OK
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--main content end-->
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
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/wizardEdit.js')}}"></script>
    <!-- end page level scripts -->
    <!-- Date picker -->
    <!-- plugin scripts -->
    <script type="text/javascript" src="{{asset('assets/vendors/jquery.uniform/js/jquery.uniform.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputlimiter/js/jquery.inputlimiter.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jquery.validVal.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/jquery.inputmask.bundle.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/daterangepicker/js/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/autosize/js/jquery.autosize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jasny-bootstrap/js/inputmask.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datetimepicker/js/DateTimePicker.min.js')}}"></script>
<!--end of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/form.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/datetime_piker.js')}}"></script>
@stop