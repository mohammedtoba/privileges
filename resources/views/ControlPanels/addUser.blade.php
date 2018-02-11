@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Add Users
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}" />
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
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}" />
    <!-- Radio -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/radio_css/css/radiobox.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/radio_checkbox.css')}}"
    <!-- end of page level styles -->
@stop


{{-- Page content --}}
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-6 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-user"></i>
                        User Grid
                    </h4>
                </div>
                <div class="col-lg-6 col-sm-8 col-12">
                    <ol class="breadcrumb float-right  nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Users</a>
                        </li>
                        <li class="active breadcrumb-item">User Grid</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="card" id="addUser">
                <div class="card-header bg-primary">
                    Add or update user
                </div>
                <div class="card-body m-t-35" id="user_body2">
                    <div class="row">
                        <div class="col-lg">
                            <form class="form-horizontal" method="POST" action="{{ route('updateOrCreateUser') }}" id="register_valid">
                             {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="name" class="col-form-label ">First name *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="first name" value="{{$users? $users->name :old('name') }}">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user "></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="name_ar" class="col-form-label ">Last name *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="last name" value="{{$users ?$users->name_ar:old('name_ar')  }}">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user "></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="empno" class="col-form-label ">Empliyee number *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="empno" id="empno" placeholder="99999" value="{{$users? $users->empno:old('empno') }}">
                                            <span class="input-group-addon">
                                                <i class="fa fa-barcode "></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="depno" class="col-form-label ">Department *</label>
                                        <div class="input-group">
                                            <select class="form-control" id="depno" name="depno"  >
                                                <option disabled selected department> -- select an option -- </option>
                                                @foreach($dept as $i)
                                                    <option 
                                                    @if($users)
                                                    {{old('depno',$users->depno) == ($i->id)? 'selected' : ''}}
                                                    @else
                                                    {{old('depno') == ($i->id)? 'selected' : ''}}
                                                    @endif
                                                     value={{$i->id}} > {{$i->dept_nam}}</option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-addon">
                                                <i class="fa fa-th-large "></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-2 @if($users)
                                                    {{($users->usrtype)?'has-success':''}}
                                                    @endif">
                                        <div>
                                            <label class="col-form-label ">Is a medical staff?</label>
                                        </div>
                                        <div>
                                            <div class="diff_colored_radio">
                                                <div class="btn-group d-inline-block" data-toggle="buttons">
                                                    
                                                    <label class="btn btn-success 
                                                    @if($users)
                                                    {{old('usrtype',$users->usrtype) == "M"?'active':''}}
                                                    @else
                                                    {{old('usrtype') == "M"?'active':''}}
                                                    @endif
                                                    " data-toggle="tooltip" data-placement="top" title="Medical staff">
                                                        <input type="radio"  name="usrtype" value="M"   >
                                                        <span class="fa fa-stethoscope">&nbsp;Yes</span>
                                                    </label>
                                                    <label class="btn btn-secondary @if($users)
                                                    {{old('usrtype',$users->usrtype) == "B"?'active':''}}
                                                    @else
                                                    {{old('usrtype') == "M"?'active':''}}
                                                    @endif" data-toggle="tooltip" data-placement="top" title="Non medical staff">
                                                        <input type="radio"  name="usrtype" value="B"   >
                                                        <span class="fa fa-user">&nbsp;No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="email" class="col-form-label ">Email *</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Email Address" name="email" id="email" class="form-control" value="{{$users? $users->email :old('email')}}">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope "></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="password" class="col-form-label ">Password *</label>
                                        <div class="input-group">
                                            <input type="password" placeholder="Password" id="password" name="password" class="form-control">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key "></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="confirmpassword" class="col-form-label ">Confirm Password *</label>
                                        <div class="input-group">
                                            <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" class="form-control">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key "></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="form-group row">
                                    <div class="col-6">
                                        <button  type="submit" class="btn btn-block btn-success login_button">Submit</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="reset" class="btn btn-block btn-danger">Reset</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.print.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery.backstretch/js/jquery.backstretch.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/switchery/js/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/radio_checkbox.js')}}"></script>
    <!--end of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/users.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
    <!-- end page level scripts -->

 <!--End of plugin js-->
<script type="text/javascript" src="{{asset('assets/js/pages/login4.js')}}"></script>
@stop